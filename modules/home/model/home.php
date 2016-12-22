<?php 
class Home{
	private $posts;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
        $this->posts     = new system\Model($this->lang.'_posts');
	}
	public function getAllNews($start=null,$limit=null){
    	$select = $this->lang."_posts.id,".$this->lang."_posts.title,".$this->lang."_posts.alias,".$this->lang."_posts.description,".$this->lang."_posts.thumbnail,".$this->lang."_posts.create_time, user.id as id_user, user.username";
    	$this->posts->where( $this->lang."_posts.status",1);
    	$this->posts->join('user', 'user.id = '.$this->lang.'_posts.author_create', 'LEFT');
    	if ($start== null && $limit==null) {
    		$result = $this->posts->get(null,null,$select);
    	}else{
    		$result = $this->posts->get(null,array($start,$limit),$select);
    	}
    	return $result;
    }
}
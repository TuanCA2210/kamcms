<?php 
class Posts{
	private $cate;
    private $posts;
	private $comments;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->posts     = new system\Model($this->lang.'_posts');
        $this->cate     = new system\Model($this->lang.'_categories_posts');
		$this->comments     = new system\Model($this->lang.'_comments_posts');
	}
	public function getBreadcrumbsCategory($idCate, $data = array()) {
        $this->cate->where("id",$idCate);
        $this->cate->where("status",1);
        $category = $this->cate->getOne();

        $category['link'] = base_url().alias($category['title']).'-c'.$category['id'].'.htm';
        $data[]           = array(
            'name' => (isset($category['title']) ? $category['title'] : ''),
            'href'  => $category['link'],
        );
        if (isset($category['parent_id']) && $category['parent_id'] > 0) {
            $data = $this->getBreadcrumbsCategory($category['parent_id'], $data);
        }
        return $data;
    }
    public function getposts(){
    	$this->posts->where('status',1);
		$result  = $this->posts->num_rows();
		return $result;
	}
    public function getAllPost($start,$limit){
    	$select = $this->lang."_posts.id,".$this->lang."_posts.title,".$this->lang."_posts.alias,".$this->lang."_posts.thumbnail,".$this->lang."_posts.create_time, user.id as id_user, user.username";
    	$this->posts->where( $this->lang."_posts.status",1);
    	$this->posts->join('user', 'user.id = '.$this->lang.'_posts.author_create', 'LEFT');
    	$result = $this->posts->get(null,array($start,$limit),$select);
    	return $result;
    }
    public function getDetail($id){
        $select = $this->lang."_posts.*, user.id as id_user, user.username";
        $this->posts->where( $this->lang."_posts.status",1);
        $this->posts->where( $this->lang."_posts.id",$id);
        $this->posts->join('user', 'user.id = '.$this->lang.'_posts.author_create', 'LEFT');
        $result = $this->posts->getOne(null,null,$select);
        return $result;
    }
    public function insert_comt($data){
        $this->comments->insert($data);
    }
}
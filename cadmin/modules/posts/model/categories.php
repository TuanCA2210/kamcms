<?php 
class Categories{
	private $categories;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->categories     = new system\Model($this->lang.'_categories_posts');
	}
	public function getCategories(){
		$result  = $this->categories->get();
		return $result;
	}
	public function getPagiCategories($start,$limit){
		$select = $this->lang."_categories_posts.*, user.id as id_user, user.username";
		$this->categories->join('user', 'user.id = '.$this->lang.'_categories_posts.author_create', 'LEFT');
		$result  = $this->categories->get(null, array($start,$limit),$select);
		//$result  = $this->categories->rawQuery($sql);
		return $result;
	}
	public function update($data,$id){
		$this->categories->where('id',$id);
		$this->categories->update($data);
	}
	public function delete($id){
		$this->categories->where('id',$id);
		$this->categories->delete();
	}
	public function insertData($data_insert){
		$this->categories->insert($data_insert);
	}

	public function checkId($id){
		$this->categories->where('id',$id);
		$result  = $this->categories->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	public function getDataById($id){
		$this->categories->where('id',$id);
		$result  = $this->categories->getOne();
		return $result;
	}
	
	public function findSearch($search){
		$select = $this->lang."_categories_posts.*, user.id as id_user, user.username";
		$this->categories->where($this->lang.'_categories_posts.title', '%'.$search.'%', 'like');
		$this->categories->join('user', 'user.id = '.$this->lang.'_categories_posts.author_create', 'LEFT');
		$result  = $this->categories->get(null,null,$select);
		return $result;
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_categories_posts WHERE id IN (".$name.")";
		$this->categories->rawQuery($sql);
	}

}
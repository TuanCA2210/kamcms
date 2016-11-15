<?php 
class Category{
	private $category;
	public function __construct(){
		global $_web;
		$this->lang        				= $_web['lang'];
		$this->category     			= new system\Model($this->lang.'_category');
	}
	public function getCategories(){
		$result  = $this->category->get();
		return $result;
	}
	public function update($data,$id){
		$this->category->where('id',$id);
		$this->category->update($data);
	}
	public function delete($id){
		$this->category->where('id',$id);
		$this->category->delete();
	}
	public function insertData($data_insert){
		$this->category->insert($data_insert);
	}
}
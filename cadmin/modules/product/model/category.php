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
}
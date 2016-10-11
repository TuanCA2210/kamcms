<?php 
class Pages{
	private $pages;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->pages     = new system\Model($this->lang.'_pages');
	}
	public function getDetail($id){
		$this->pages->where('id',$id);
		$result  = $this->pages->getOne();
		return $result;
	}
}
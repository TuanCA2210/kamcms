<?php 
class Pages{
	private $pages;
	private $contact;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->pages     = new system\Model($this->lang.'_pages');
		$this->contact     = new system\Model('web_contacts');
	}
	public function getDetail($id){
		$this->pages->where('id',$id);
		$result  = $this->pages->getOne();
		return $result;
	}
	public function insertContact($data){
		$this->contact->insert($data);
	}
}
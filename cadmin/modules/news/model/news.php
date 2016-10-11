<?php 
class News{
	private $user;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->user     = new system\Model('user');
	}
	public function getAll($id){
		$this->user->where('group_id',$id);
		$result  = $this->user->get();
		return $result;
	}
}
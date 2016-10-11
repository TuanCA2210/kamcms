<?php 
class Home{
	private $user;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->user     = new system\Model('user');
	}
	public function getUserById($id){
		$this->user->where('group_id',$id);
		$result  = $this->user->getOne();
		return $result;
	}
}
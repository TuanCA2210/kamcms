<?php 
class User{
	private $user;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->user     = new system\Model('frontend_user');
	}
	public function getAll(){
		$result  = $this->user->get();
		return $result;
	}
}
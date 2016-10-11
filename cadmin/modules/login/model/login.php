<?php 
class Login{
	private $user,$group;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->user     = new system\Model('user');
		$this->group     = new system\Model('group');
	}
	public function getAll($id){
		$this->user->where('group_id',$id);
		$result  = $this->user->get();
		return $result;
	}
	public function checkEmail($email){
		$this->user->where("email",$email);
		return $this->user->num_rows();
	}
	public function checkLogin($email,$pass){
		$this->user->where("email",$email);
		$this->user->where("password",$pass);
		return $this->user->getOne();
	}
}
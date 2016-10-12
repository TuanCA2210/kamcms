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
	public function checkEmail($email){
		$this->user->where("email",$email);
		return $this->user->num_rows();
	}
	public function checkLogin($email,$pass){
		$this->user->where("email",$email);
		$this->user->where("password",$pass);
		return $this->user->getOne();
	}
	public function insertData($data){
		$this->user->insert($data);
	}
}
<?php 
class Home{
	private $user;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->user     = new system\Model('user');
		$this->web_settings     = new system\Model('web_settings');
	}
	public function getUserById($id){
		$this->user->where('group_id',$id);
		$result  = $this->user->getOne();
		return $result;
	}
	public function getSettingsOne(){
		$this->web_settings->where('id',2);
		$result  = $this->web_settings->getOne();
		return $result;
	}
}
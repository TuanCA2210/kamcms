<?php 
class Users{
	private $user;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->user     = new system\Model('user');
	}
	public function getUsers(){
		$result  = $this->user->get();
		return $result;
	}
	public function getPagiUser($start,$limit){
		$select = "*";
		$result  = $this->user->get(null, array($start,$limit),$select);

		//$sql ='SELECT * FROM user LIMIT '.$start.','.$limit;
		//$result  = $this->user->rawQuery($sql);
		return $result;
	}
	public function checkUser($username){
		$this->user->where('username',$username);
		$result  = $this->user->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function checkEmail($email){
		$this->user->where('email',$email);
		$result  = $this->user->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function checkId($id){
		$this->user->where('id',$id);
		$result  = $this->user->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function insertData($data_insert){
		$this->user->insert($data_insert);
	}
	public function getUserById($id){
		$this->user->where('id',$id);
		$result  = $this->user->getOne();
		return $result;
	}
	public function update($data,$id){
		$this->user->where('id',$id);
		$this->user->update($data);
	}
	public function delete($id){
		$this->user->where('id',$id);
		$this->user->delete();
	}
	public function findSearch($search){
		$this->user->where('username', '%'.$search.'%', 'like');
		$result  = $this->user->get();
		return $result;
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = 'DELETE FROM user WHERE id IN ('.$name.')';
		$this->user->rawQuery($sql);
	}

}
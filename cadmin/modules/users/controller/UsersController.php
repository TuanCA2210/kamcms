<?php 
class UsersController extends Controller{
	public $modelUsers;
	public function __construct(){
		parent::__construct();
		$this->modelUsers = $this->loadModel('Users');
	}
	public function index(){
		global $_web;
		$this->view->render('index');
	}	
}
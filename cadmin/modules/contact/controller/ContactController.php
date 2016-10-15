<?php 
class ContactController extends Controller{
	public $modelNews;
	//public $loadPages;
	public function __construct(){
		parent::__construct();
		$this->modelNews = $this->loadModel('Contact');
	}
	public function index(){
		global $_web;
		//$this->view->data  = $this->modelNews->getUserById(1);

		

		$this->view->render('index');
	}
	
}
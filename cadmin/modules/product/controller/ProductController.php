<?php 
class ProductController extends Controller{
	public $modelNews;
	public function __construct(){
		parent::__construct();
		$this->modelNews = $this->loadModel('Product');
	}
	public function index(){
		global $_web;
		$this->view->data  = $this->modelNews->getUserById(1);
		

		$this->view->render('index_product');
	}
	
	
}
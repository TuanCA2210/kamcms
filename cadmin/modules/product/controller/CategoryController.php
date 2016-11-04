<?php 
class CategoryController extends Controller{
	public $modelCategory;
	public function __construct(){
		parent::__construct();
		$this->modelCategory = $this->loadModel('Category');
	}
	public function index(){
		global $_web;
		$this->view->data  = $this->modelNews->getUserById(1);
		

		$this->view->render('index_category');
	}
	public function add(){
		$dir          = DIR_TMP.'cdn/';
		$this->view->data['images'] = getImagesToFolder($dir);

		$this->view->data['menu']   = $this->modelCategory->getCategories();
		dd($this->view->data['menu']);
		$this->view->render('add_category');
	}
	
	
}
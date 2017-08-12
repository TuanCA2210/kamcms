<?php 
class MediafinderController extends Controller{
	public $modelImages;
	//public $loadPages;
	public function __construct(){
		parent::__construct();
		$this->modelImages = $this->loadModel('media');
	}
	public function index(){
		global $_web;
		//$this->view->data['images']  = $this->modelImages->getAllImages();

		$this->view->render('index');
	}
	
}
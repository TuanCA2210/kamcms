<?php 
class WidgetsController extends Controller{
	public $modelWidgets;
	public function __construct(){
		parent::__construct();
		$this->modelWidgets = $this->loadModel('Widgets');

	}
	public function index(){
		global $_web;
		
		$this->view->render('widgets_index');
	}	
	
}
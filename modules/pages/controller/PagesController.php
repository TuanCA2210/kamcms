<?php 
class PagesController extends Controller{
	public $modelPages;
	//public $loadPages;
	public function __construct(){
		parent::__construct();
		$this->modelPages = $this->loadModel('Pages');
	}
	public function index(){

		$this->view->render('index');
	}
	public function detail(){
		global $_L;
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = $_GET['id'];
			$this->view->data  = $this->modelPages->getDetail($id);
		}
		$this->view->render('index');
		
	}
	
}
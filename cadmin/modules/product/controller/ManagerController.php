<?php 
class ManagerController extends Controller{
	public $modelProduct;
	public $modelCategory;
	public $modelBrand;
	public $modelManager;
	public function __construct(){
		parent::__construct();
		$this->modelCategory = $this->loadModel('Category');
		$this->modelProduct = $this->loadModel('Product');
		$this->modelBrand = $this->loadModel('Brand');
		$this->modelManager = $this->loadModel('Manager');
	}
	public function index(){
		global $_web;
		$this->view->data['view_home'] = $this->modelManager->getManagerView();
		$this->view->render('manager_home');
	}
	public function add(){
		if (isset($_POST['title'])) {
			sleep(2);
			$title = trim(addslashes($this->input->post('title')));	
			$count = trim(addslashes($this->input->post('count')));	

			$data = array(
				'title'			=> $title,
				'status'			=> 1,
				'position'			=> $count,
			);
			$data['create_author'] 	= Session::get('id');
			$data['create_time'] 	= time();
			$id = $this->modelManager->insertData($data);
			$mess = lang('insert_page_success');
			$data_mess = array(
				'status'	=> true,
				'id'		=> $id,
				'title'		=> $title,
				'position'	=> $count,
				'mess'		=> $mess
			);
			echo json_encode($data_mess);
			
            
            
		}
	}
	public function edit(){
		if (isset($_POST['title']) && is_numeric($_POST['id'])) {
			$title = trim(addslashes($this->input->post('title')));	
			$id = trim(addslashes($this->input->post('id')));	
			$data = array(
				'title'			=> $title
			);
			$data['update_author'] 	= Session::get('id');
			$data['update_time'] 	= time();
			$id = $this->modelManager->update($data,$id);
			$mess = lang('update_page_success');
			$data_mess = array(
				'status'	=> true,
				'id'		=> $id,
				'title'		=> $title,
				'mess'		=> $mess
			);
			echo json_encode($data_mess);
			
            
            
		}
	}
	
}
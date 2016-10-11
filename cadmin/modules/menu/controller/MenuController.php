<?php 
class MenuController extends Controller{
	public $modelMenu;
	public function __construct(){
		parent::__construct();
		$this->modelMenu = $this->loadModel('Menu');

	}
	public function index(){
		global $_web;
		// Check if there are any SUCCESS messages
		if (isset($_SESSION['flash_success'])) {
			$this->view->data['flash_success'] = Session::get('flash_success');
			unset($_SESSION['flash_success']);
		}
		$this->view->data['categories'] 	= $this->modelMenu->getAllCategories();
		$this->view->data['pages'] 			= $this->modelMenu->getPages();
		
		$this->view->data['position'] = $pos = (int)$this->input->get('pos');
		$this->view->data['menu'] = $this->modelMenu->getMenu($pos);
		if ($this->modelMenu->checkIdPosition($pos) == FALSE) {

			$this->view->data['position_data'] = $this->modelMenu->getPositionById($pos);
		}
		
		
		$this->view->render('menu_index');
	}	
	public function addPagesToMenu(){
		//$a = $this->modelMenu->lastIdTable();
		if (!empty($_POST['link']) && isset($_POST['type'])) {
			$data = "";
			$i=0;
			sleep(1);
			foreach ($_POST['link'] as $value) {
				if ($i==0) {
					$data .=" ('".lang('anonymous')."','".$value."' , '0', '1','0','".trim(addslashes($_POST['type']))."','".(int)$_POST['position']."')";
				}else{
					$data .=",('".lang('anonymous')."','".$value."' , '0', '1','0','".trim(addslashes($_POST['type']))."','".(int)$_POST['position']."')";
				}
				$i++;
			}
			if ($data!="") {
				$this->modelMenu->insertMultiRow($data);
				$data_st = array(
					'status'	=> true,
					'mess'		=> 'Thêm vào menu thành công!'
				);
				echo json_encode($data_st);
			}
		}
	}
	public function addCategoriesToMenu(){
		if (!empty($_POST['link']) && isset($_POST['type'])) {
			$data = "";
			$i=0;
			sleep(1);
			foreach ($_POST['link'] as $value) {
				if ($i==0) {
					$data .=" ('".lang('anonymous')."','".$value."' , '0', '1','0','".trim(addslashes($_POST['type']))."','".(int)$_POST['position']."')";
				}else{
					$data .=",('".lang('anonymous')."','".$value."' , '0', '1','0','".trim(addslashes($_POST['type']))."','".(int)$_POST['position']."')";
				}
				$i++;
			}
			if ($data!="") {
				$this->modelMenu->insertMultiRow($data);
				$data_st = array(
					'status'	=> true,
					'mess'		=> 'Thêm vào menu thành công!'
				);
				echo json_encode($data_st);
			}
		}
	}
	public function addCustomToMenu(){
		if (isset($_POST)) {
			$title = trim(addslashes($_POST['title']));
			$link = trim(addslashes($_POST['link']));
			$type = trim(addslashes($_POST['type']));
			$css_class = trim(addslashes($_POST['css_class']));
			$position = (isset($_POST['position'])) ? (int)$_POST['position'] : '';
			sleep(1);
			$data = array(
				'title'	=> $title,
				'alias'	=> alias($title),
				'link'	=> $link,
				'parent_id'	=> 0,
				'css_class'	=> $css_class,
				'status'	=> 1,
				'sort'	=> 0,
				'type'	=> $type,
				'position'	=> $position,
			);
			$this->modelMenu->insertData($data);
			$data_st = array(
				'status'	=> true,
				'mess'		=> 'Thêm vào menu thành công!'
			);
			echo json_encode($data_st);
		}
	}
	public function loadMenu(){
		$position = (isset($_GET['pos'])) ? (int)$_GET['pos'] : '';
		$this->view->data['data'] = $this->modelMenu->getMenu($position);
		$this->view->render('menu_content',false);
	}
	public function callMenuSelecBox(){
		$position = (isset($_GET['pos'])) ? (int)$_GET['pos'] : '';
		$this->view->data['data'] = $this->modelMenu->getMenu($position);
		$this->view->render('menu_select_box',false);
	}
	public function updateMenu(){
		if (!empty($_POST)) {
			sleep(1);
			$data = array(
				'title'	=> trim(addslashes($_POST['title'])),
				'link'	=> trim(addslashes($_POST['link'])),
				'sort'	=> is_numeric($_POST['sort']) ? $_POST['sort'] : (int)0,
				'css_class'	=> trim(addslashes($_POST['css_class'])),
				'parent_id'	=> is_numeric($_POST['parent_menu']) ? $_POST['parent_menu'] : (int)0
			);
			if (is_numeric($_POST['id'])) {
				$id = $_POST['id'];
				$position = (isset($_POST['position'])) ? (int)$_POST['position'] : '';
				$this->modelMenu->update($data,$id,$position);
				$data_mess = array(
					'status'	=> true,
					'mess'		=> lang('update_page_success')
				);
				echo json_encode($data_mess);
			}else{
				$data_mess = array(
					'status'	=> false,
					'mess'		=> lang('logo_update_errors')
				);
				echo json_encode($data_mess);
			}
		}
	}
	public function deleteMenu(){
		if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['pos'])) {
			$id = $_GET['id'];
			$position = (int)$_GET['pos'];
			$this->modelMenu->delete($id,$position);
			$mess = array(
				'flash_success' => lang('delete_success'),
			);
			Session::create($mess);
			redirect(base_url().'index.php?mod=menu&controller=menu&action=index&pos='.$position);
		}
	}

	public function updateTitleMenu(){
		if (isset($_POST['title_menu']) && is_numeric($_POST['position'])) {
			sleep(1);
			$position = $_POST['position'];
			if ($this->modelMenu->checkIdPosition($position) == FALSE) {
				$data = array(
					'title' => trim(addslashes($_POST['title_menu']))
				);
				$this->modelMenu->updatePosition($data,$position);
				$mess = array(
					'flash_success' => lang('update_page_success'),
				);
				Session::create($mess);
				$data_mess = array(
					'status' => true,
					'href'	=>  base_url().'index.php?mod=menu&controller=menu&action=index&pos='.$position
				);
				echo json_encode($data_mess);
			}
		}
	}


}
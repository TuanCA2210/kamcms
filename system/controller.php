<?php 
class Controller{
	public $view,$input,$mod,$controller,$action,$id,$loadPages,$modelGlobals,$menu;
	
	public function __construct(){
		global $_web;
		$this->mod          = $_web['uri']['mod'];
		$this->controller         = $_web['uri']['controller'];
		$this->action          = $_web['uri']['action'];
		$this->id           = $_web['uri']['id'];

		$this->input = new Input();
		$this->view = new View(); 
		$this->loadLibrary('paging');
		$this->modelGlobals = $this->loadModelGlobals('GlobalsModel');
		$_web['menu'] = $this->getMenuGlobals();
		$_web['settings'] = $this->getSettingsGlobals();
		$_web['options'] = $this->getOptionsGlobals();
		
	}
	public function loadModel($file, $mod = null) {
		if ($mod === null) {
			$path = DIR_MODULES . $this->mod . '/model/' . $file . '.php';
			if (file_exists($path)) {
				include_once $path;
				$obj = new $file();
				return $obj;
			} else {
				die('Không tồn tại file này' . $path);
			}
		} else {
			$path = DIR_MODULES . $mod . '/model/' . $file . '.php';
			if (file_exists($path)) {
				include_once $path;
				$obj = new $file();
				return $obj;
			} else {
				die('Không tồn tại file này' . $path);
			}
		}
	}
	public function loadLibrary($file) {
			$path = DIR_APP . 'libraries/' . $file . '.php';
			if (file_exists($path)) {
				include_once $path;
			} else {
				die('Không tồn tại file này' . $path);
			}
		
	}
	public function isPost($key){
		if (isset($_POST[$key])) {
			return true;
		}else{
			return false;
		}
	}
	public function loadModelGlobals($file){
		$path = DIR_MODULES . $file . '.php';
		if (file_exists($path)) {
			include_once $path;
			$obj = new $file();
			return $obj;
		} else {
			die('Không tồn tại file này' . $path);
		}
	}
	public function getMenuGlobals(){
		$data = $this->modelGlobals->getMenu(1);
		return $data;
	}
	public function getSettingsGlobals(){
		$data = $this->modelGlobals->getSettings();
		return $data;
	}
	public function getOptionsGlobals(){
		$data = $this->modelGlobals->getOptions();
		return $data;
	}

	// set Messager flash
	public function flashMessager($key='flash_success',$mess='Messager Demo Success.'){
		$mess = array(
			$key => $mess
			//'flash_success' => lang('update_page_success'),
		);
		Session::create($mess);
	}
	public function getFlashMessager($key='flash_success'){
		if (isset($_SESSION[$key])) {
			$this->view->flash[$key] = $_SESSION[$key];
			unset($_SESSION[$key]);
		}
	}
	

	
}
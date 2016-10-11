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
		$this->modelGlobals = $this->loadModelGlobals('GlobalsModel');
		$_web['menu'] = $this->getMenuGlobals();
		
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
		$data = $this->modelGlobals->getAll(1);
		return $data;
	}
	

	
}
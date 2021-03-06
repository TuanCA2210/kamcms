<?php 
use voku\Cart\Cart;
use voku\Cart\Storage\Session;
use voku\Cart\Identifier\Cookie;
class Controller{
	public $view,$input,$mod,$controller,$action,$id,$loadPages,$modelGlobals,$menu,$cart;
	
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
		$_web['widgets'] = $this->getWidgetsGlobals();


		$this->cart 			= new Cart(new Session, new Cookie);
		$_web['cart'] 			= $this->cart->contents();
		$_web['total_cart'] 	= $this->cart->total();
		$_web['total_item'] 	= $this->cart->totalItems();
		$_web['total_unique'] 	= $this->cart->totalUniqueItems();
		
	}
	public function loadModel($file, $mod = null) {
		if ($mod === null) {
			$path = DIR_MODULES . $this->mod . '/model/' . lcfirst($file) . '.php';
			if (file_exists($path)) {
				include_once $path;
				$obj = new $file();
				return $obj;
			} else {
				die('Không tồn tại file này' . lcfirst($path));
			}
		} else {
			$path = DIR_MODULES . $mod . '/model/' . lcfirst($file) . '.php';
			if (file_exists($path)) {
				include_once $path;
				$obj = new $file();
				return $obj;
			} else {
				die('Không tồn tại file này' . lcfirst($path));
			}
		}
	}
	public function loadLibrary($file) {
			$path = DIR_APP . 'libraries/' . lcfirst($file) . '.php';
			if (file_exists($path)) {
				include_once $path;
			} else {
				die('Không tồn tại file này' . lcfirst($path));
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
		$path = DIR_MODULES . lcfirst($file) . '.php';
		if (file_exists($path)) {
			include_once $path;
			$obj = new $file();
			return $obj;
		} else {
			die('Không tồn tại file này' . lcfirst($path));
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
	public function getWidgetsGlobals(){
		$data = $this->modelGlobals->getWidgets();
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
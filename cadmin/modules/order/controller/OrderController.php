<?php 
class OrderController extends Controller{
	public $modelOrder;
	//public $loadPages;
	public function __construct(){
		parent::__construct();
		$this->modelOrder = $this->loadModel('Order');
	}
	public function index(){
		global $_web;
		$this->view->data['data_order']  = $this->modelOrder->getAllOrder();
		$this->view->data['data_status_order']  = $this->modelOrder->getStatusOrder();

		$this->view->render('index');
	}
	
	public function notfound(){
		$this->view->render('404',false);
	}
	
}
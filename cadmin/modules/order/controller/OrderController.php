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
	public function detail(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = $_GET['id'];

			$this->view->data['data_info_order'] = $this->modelOrder->getInfoOrderById($id);
			$this->view->data['data_info_order']['info_buy'] = json_decode($this->view->data['data_info_order']['info_buy'],true);
			$address_buy = $this->modelOrder->getProvinceById($this->view->data['data_info_order']['info_buy']['province']);
			$district_buy = $this->modelOrder->getDistrictById($this->view->data['data_info_order']['info_buy']['district']);
			$this->view->data['data_info_order']['info_buy']['full_address'] = $this->view->data['data_info_order']['info_buy']['address'] .' - '. $district_buy['nhanh_name'] . ' - ' .$address_buy['name'].'.';

			$this->view->data['data_info_order']['info_receive'] = json_decode($this->view->data['data_info_order']['info_receive'],true);
			$address_receive = $this->modelOrder->getProvinceById($this->view->data['data_info_order']['info_receive']['province']);
			$district_receive = $this->modelOrder->getDistrictById($this->view->data['data_info_order']['info_receive']['district']);
			$this->view->data['data_info_order']['info_receive']['full_address'] = $this->view->data['data_info_order']['info_receive']['address'] .' - '. $district_receive['nhanh_name'] . ' - ' .$address_receive['name'].'.';

			//get all product in order by id
			$this->view->data['data_info_order']['product'] = $this->modelOrder->getProductOrderById($id);

			$this->view->data['order_status'] = $this->modelOrder->getStatusOrder();



			$this->view->render('detail_view');
		}
	}
	public function notfound(){
		$this->view->render('404',false);
	}

	public function saveOrder(){
		if (isset($_POST['data']['id']) && is_numeric($_POST['data']['id'])) {
			$id = $_POST['data']['id'];
			$status = $_POST['data']['status'];
			$note = trim(addslashes($_POST['data']['note']));
			$data = array(
				'status' => $status,
				'note'	=> $note
			);
			$this->modelOrder->updateOrderCart($data,$id);
			$data_mess = array(
				'status' => true,
				'mess'   => 'Lưu thành công dữ liệu thành công.'
 			);
 			echo json_encode($data_mess);
		}
	}





	
}
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
		$this->getFlashMessager('flash_success');
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			
			if (isset($_POST['send_mess'])) {
				$name = trim(addslashes($_POST['name']));
				$phone = trim(addslashes($_POST['phone']));
				$email = trim(addslashes($_POST['email']));
				$mess = trim(addslashes($_POST['mess']));
				$data_mess = array(
					'name'	=> $name,
					'phone'	=> $phone,
					'email'	=> $email,
					'content'	=> $mess,
					'create_time'	=> time()
				);
				$this->modelPages->insertContact($data_mess);
				$this->flashMessager("flash_success","Cảm ơn bạn đã gửi tin cho chúng tôi.");
				redirect('current');
			}
			$id = $_GET['id'];
			$this->view->data  = $this->modelPages->getDetail($id);
		}
		$this->view->render('index');
		
	}
	
}
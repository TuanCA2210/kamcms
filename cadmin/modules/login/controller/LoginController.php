<?php 
class LoginController extends Controller{
	public $modelNews;
	public $errors = array();
	//public $loadPages;
	public function __construct(){
		parent::__construct();
		$this->modelUser = $this->loadModel('Login');
	}
	public function index(){
		if (isset($_SESSION['id']) || isset($_SESSION['group_id'])) redirect(base_url());
		$this->view->data  = $this->modelUser->getAll(1);
		if ($this->isPost('login')==true) {
			$email = $this->input->post('email');
			$password = md5("lnc".$this->input->post('password'));
			if ($email==null) {
				$this->view->errors[] = "Bạn không được để email trống!";
			}elseif ($password==null) {
				$this->view->errors[] = "Bạn không đươc để mật khẩu trống!";
			}else{
				if ($this->modelUser->checkEmail($email) > 0) {
					$user = $this->modelUser->checkLogin($email,$password);
					if (!empty($user)) {
						$data = array(
							'id' 		=> $user['id'],
							'email' 	=> $user['email'],
							'username' 	=> $user['username'],
							'group_id'	=> $user['group_id']
						);
						Session::create($data);
						redirect(base_url()."index.php?mod=home&controller=home&action=index");
					}else{
						$this->view->errors[] = "Mật khẩu của bạn không chính xác.";
					}
				}else{
					$this->view->errors[] = "Email của bạn không chính xác.";
				}
			}
		}
		$this->view->render('index',false);
	}
	public function login(){
		
		
	}
	public function logout(){
		$data = array('id','email','username','group_id');
		Session::destroy($data);
		redirect(base_url());
	}

	/*public function __destruct(){
		$this->loadView();
	}*/
	
}
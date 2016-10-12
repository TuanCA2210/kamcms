<?php 
class UserController extends Controller{
	public $modelUser;
	public function __construct(){
		parent::__construct();
		$this->modelUser = $this->loadModel('User');
	}
	public function index(){
		$status = true;
		$error = array();
		$success = array();
		if (isset($_POST['regis_ok']) && $_SESSION['_token']==$_POST['_token']) {
			if ($this->input->post('email') == '') {
				$status = false;
				$error[]  = lang('no_email');
			}
			if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
				$status = false;
				$error[]  = lang('invalid_email');
			}
			if ($this->input->post('username') == '') {
				$status = false;
				$error[]  = lang('no_username');
			}
			if ($this->input->post('password') == '') {
				$status = false;
				$error[]  = lang('no_pass');
			}
			if ($this->input->post('password')!=$this->input->post('repassword')) {
				$status = false;
				$error[]  = lang('invalid_pass');
			}
			if (checkCaptcha($_POST['captcha_cha'])==true && $status == true) {

				$data = array(
					'email'		=> trim(addslashes($this->input->post('email'))),
					'username'	=> trim(addslashes($this->input->post('username'))),
					'password'	=> md5("cuongle.dev@gmail.com|".$this->input->post('password')),
					'create_time'	=> time(),
					'status'	=> 1 // để trống sau này dùng confirm send mail
				);
				if ($this->modelUser->checkEmail($data['email']) == 0) {
					$this->modelUser->insertData($data);
					$success[] = lang('success_regis');
				}else{
					$error[]  = lang('email_regis');
				}
			}else{
				$error[]  = lang('no_capcha');
			}
			
		}
		if (isset($_POST['login_ok'])) {
			if ($this->input->post('txtemail')=='') {
				$status = false;
				$error[]  = lang('no_email');
			}
			if (!filter_var($this->input->post('txtemail'), FILTER_VALIDATE_EMAIL)) {
				$status = false;
				$error[]  = lang('invalid_email');
			}
			if ($this->input->post('txtpassword') == '') {
				$status = false;
				$error[]  = lang('no_pass');
			}
			if ($status==true) {
				$email = $this->input->post('txtemail');
				$pass =  md5("cuongle.dev@gmail.com|".$this->input->post('txtpassword'));
				$data_user = $this->modelUser->checkLogin($email,$pass);
				if (!empty($data_user)) {
					//session_destroy();
					$data_new = array(
						'userid' => $data_user['id'],
						'username' => $data_user['username']
					);
					Session::create($data_new);

					echo "<pre>";
					print_r($_SESSION);
					echo "</pre>";

				}else{
					$status = false;
					$error[]  = lang('no_email_no_pass');
				}

			}

		}



		$token =  rand(0,1000000000);
		$this->view->data['_token'] =$token;
		$_SESSION['_token'] = $token;
		$this->view->error = $error;
		$this->view->success = $success;
		$this->view->render('index');
	}
	public function capcha(){
		createCaptcha();
	}
	
}
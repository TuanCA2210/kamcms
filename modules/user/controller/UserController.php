<?php 
class UserController extends Controller{
	public $modelUser;
	//public $loadPages;
	public function __construct(){
		parent::__construct();
		$this->modelUser = $this->loadModel('User');
	}
	public function index(){
		if (isset($_POST['regis_ok']) && $_SESSION['_token']==$_POST['_token']) {
			echo "<pre>";
			print_r($_POST);
			echo "</pre>";
		}
		$token =  rand(0,1000000000);
		$this->view->data['_token'] =$token;
		$_SESSION['_token'] = $token;
		$this->view->render('index');
	}
	public function capcha(){
		createCaptcha();
	}

	/*public function checkCaptcha(){
	    $ca = $this->request->get_string('captcha','POST');
	    $captcha = checkCaptcha($ca);
    	if($captcha){
        	$data['captcha'] = $ca;
    	}else{
        	$data['captcha'] =  '0';
    	}
    	echo $data['captcha'];
    	exit;
	}*/
	
}
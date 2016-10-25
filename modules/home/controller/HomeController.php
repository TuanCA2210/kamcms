<?php 
class HomeController extends Controller{
	public $modelNews;
	//public $loadPages;
	public function __construct(){
		parent::__construct();
		$this->modelNews = $this->loadModel('Home');
	}
	public function index(){
		/*$this->view->title = "Thiết kê website";
		$this->view->description = "Bài học này sẽ giúp các bạn biết cách sử dụng thẻ meta Description sao cho hiệu quả và đúng quy tắc của Google.";
		$this->view->keywords = "PHP, Laravel, ZendFramework, Phalcon";
		$this->view->author = "Lê Ngọc Cường";*/



		$link = base_url().'home.htm';
		$all_pages = $this->modelNews->getAllNews();
		
		$paging = new Paging(count($all_pages),$link);
		$limit = 2;
		// Tổng số trang
		$count_page = $paging->findPages($limit);
		// Bắt đầu từ mẫu tin
		$start =$paging->rowStart($limit);
		// Trang hiện tại
		$curpage = ($start/$limit)+1;

		$this->view->data['list']  = $this->modelNews->getAllNews($start,$limit);

		$this->view->data['pagination'] = $paging->pagesList($curpage); 


		$this->view->render('index');
	}
	public function setLang(){
		$lang = $this->input->post('lang');
		$cookie_name = "lang";
		$cookie_value = $lang;
		setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day
		$data = array(
			'status' => true,
			'mess'	 => 'Success'
		);
		echo json_encode($data);
	}

	
}
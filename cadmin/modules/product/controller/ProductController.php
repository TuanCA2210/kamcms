<?php 
class ProductController extends Controller{
	public $modelProduct;
	public $modelCategory;
	public function __construct(){
		parent::__construct();
		$this->modelCategory = $this->loadModel('Category');
	}
	public function index(){
		global $_web;
		$link = base_url().'product/product/index';
		$all_pages = $this->modelProduct->getProduct();

		$paging = new Paging(count($all_pages),$link);
		$limit =20;
		// Tổng số trang
		$count_page = $paging->findPages($limit);
		// Bắt đầu từ mẫu tin
		$start =$paging->rowStart($limit);
		// Trang hiện tại
		$curpage = ($start/$limit)+1;

		// Xuất dữ liệu với truy vấn
		$this->view->data['data'] = $this->modelProduct->getPagiProduct($start,$limit);
		$this->view->data['curpage'] = $curpage;
		$this->view->data['count_page'] = $count_page;
		
		$this->view->data['pagination'] = $paging->pagesList($curpage);  
		

		$this->view->render('index_product');
	}
	public function add(){
		global $_web;
		$this->view->data['menu']   = $this->modelCategory->getCategories();

		$this->view->render('add_product');
	}
	
	
}
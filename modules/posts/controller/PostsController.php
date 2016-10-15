<?php 
class PostsController extends Controller{
	public $modelPosts;
	public function __construct(){
		parent::__construct();
		$this->modelPosts = $this->loadModel('Posts');
	}
	public function index(){
		global $_web;
		$link = base_url().'news.htm';
		$all_pages = $this->modelPosts->getPosts();

		$paging = new Paging($all_pages,$link);
		$limit = $_web['options']['pagination_number'];
		// Tổng số trang
		$count_page = $paging->findPages($limit);
		// Bắt đầu từ mẫu tin
		$start =$paging->rowStart($limit);
		// Trang hiện tại
		$curpage = ($start/$limit)+1;


		// Xuất dữ liệu với truy vấn
		$this->view->data['data'] = $this->modelPosts->getAllPost($start,$limit);
		$this->view->data['pagination'] = $paging->pagesList($curpage); 


		$this->view->render('index');
	}
	public function detail(){
		global $_L;
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = $_GET['id'];
			$this->view->data  = $this->modelPosts->getDetail($id);
		}
		$this->view->render('index');
		
	}
	public function categories(){
		$id = $_GET['id'];
		$arr_a = $this->modelPosts->getBreadcrumbsCategory($id);
        $arr_b = array(
                    0 => array(
                        'name' => 'Sản phẩm',
                        'href'  => base_url().'product'
                        ),
                    1 => array(
                        'name' => 'Trang chủ',
                        'href'  => base_url()
                        ),
                    
                    );
        $this->view->data['breadcrumb'] = array_merge($arr_a,$arr_b);
        krsort($this->view->data['breadcrumb']);
        foreach ($this->view->data['breadcrumb'] as $key => $value) {
        	echo $key . " - " . $value['name']."<br />";
        }
	}
	
}
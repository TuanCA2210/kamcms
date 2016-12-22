<?php 
class ProductController extends Controller{
	public $modelProduct;
	public function __construct(){
		parent::__construct();
		$this->modelProduct = $this->loadModel('Product');
	}
	public function index(){
		global $_web;
		$link = base_url().'news.htm';
		$all_pages = $this->modelProduct->getPosts();

		$paging = new Paging($all_pages,$link);
		$limit = $_web['options']['pagination_number'];
		// Tổng số trang
		$count_page = $paging->findPages($limit);
		// Bắt đầu từ mẫu tin
		$start =$paging->rowStart($limit);
		// Trang hiện tại
		$curpage = ($start/$limit)+1;


		// Xuất dữ liệu với truy vấn
		$this->view->data['data'] = $this->modelProduct->getAllPost($start,$limit);
		$this->view->data['pagination'] = $paging->pagesList($curpage); 


		$this->view->render('index');
	}
	public function detail(){
		global $_L;
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = $_GET['id'];
			$_SESSION['_token'] = $token;
			$this->view->data['data_product']  = $this->modelProduct->getDetail($id);
			// xu ly thoi gian khuyen mai
            $this->view->data['sale'] = false;
            if ($this->view->data['data_product']['saleoff'] > 0) {
                if ($this->view->data['data_product']['time_start'] < time() && $this->view->data['data_product']['time_end'] > time()) {
                    $this->view->data['sale'] = true;
                }
            }
            // xử lý tình trang hàng hóa
			$state = array('state_hot', 'state_arrival', 'state_new', 'state_old', 'state_no_sold','state_sale');
			$i=1;
			$this->view->data['name_state'] ='';
			if ($this->view->data['data_product']['state']!="") {
				foreach ($state as $key => $value) {
					if (strpos($this->view->data['data_product']['state'], '|'.$i.'|') !== false) {
						$name_state = lang($value);
						$this->view->data['name_state'] = lang($value);
					}
					$i++;
				}
			}
		}
		$this->view->render('detail_view');
		
	}
	public function categories(){
		$id = $_GET['id'];
		$arr_a = $this->modelProduct->getBreadcrumbsCategory($id);
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
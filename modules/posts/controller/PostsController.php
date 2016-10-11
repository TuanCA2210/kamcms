<?php 
class PostsController extends Controller{
	public $modelPosts;
	//public $loadPages;
	public function __construct(){
		parent::__construct();
		$this->modelPosts = $this->loadModel('Posts');
	}
	public function index(){

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
		$id=16;
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
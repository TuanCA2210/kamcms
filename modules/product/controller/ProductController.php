<?php 
class ProductController extends Controller{
	public $modelProduct;
	public $cart;
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


			// lấy comment rating
			$this->view->data['data_rate'] = $this->modelProduct->getRateProductById($id);
			$this->view->data['medium_rate'] = $this->modelProduct->getCountMediumRateById($id);
			if (!empty($this->view->data['medium_rate'])) {
				$medium=0;
				foreach ($this->view->data['medium_rate'] as $key => $value) {
					$medium+=$value['star'];
				}
				$this->view->data['medium_star'] = round($medium/count($this->view->data['medium_rate']), 1);
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
	public function ajaxAddRateProduct(){
		if (!empty($_POST['data'])) {
			$id_product = $_POST['data']['id_product'];
			$name = trim(addslashes($_POST['data']['name']));
			$email = $_POST['data']['email'];
			$review = trim(addslashes($_POST['data']['review']));
			$rate = $_POST['data']['rate'];
			$status = true;
			if (!filter_var($email, FILTER_VALIDATE_EMAIL) === true) {
				$status = false;
				$fiel = "email";
			    $mess = lang('invalid_email');
			}else{
				$data = array(
					'id_product' => $id_product,
					'name' 		 => $name,
					'email' 	 => $email,
					'review' 	 => $review,
					'star'  	 => $rate,
					'create_time'=> time()
				);
				$this->modelProduct->insertRate($data);
				$fiel = "";
			    $mess = lang('success').' '.lang('success_review');

			}
			$data_mess = array(
				'status'	=> $status,
				'fiel'	=> $fiel,
				'mess'	=> $mess
			);
			echo json_encode($data_mess);
		}
	}
	public function ajaxAdd2Cart(){
		global $_web;
		if (!empty($_POST['data'])) {
			if (is_numeric($_POST['data']['id'])) {
				$id = $_POST['data']['id'];
				
				$data = $this->modelProduct->getThumbnailAddCart($id);
				$item = array(
							    'id'       => $_POST['data']['id'],
							    'name'     => $_POST['data']['name'],
							    'price'    => $_POST['data']['price'],
							    'quantity' => $_POST['data']['qty'],
							    'options'  => array(
							                'size' => $_POST['data']['size'],
							                'color'=> $_POST['data']['color'],
							                'image'	=>$data['image']
					            )

							  );

				$this->cart->insert($item);
				$status = true;
				$mess = lang('add_item_to_cart');
				$html ='';
				foreach ($this->cart->contents(true) as $key => $value) {
	                  $html .= '<li>
	                          <a href="shop-item.html"><img src="'.$_web['base_url_cdn'].$value['options']['image'].'" width="37" height="34"></a>
	                          <span class="cart-content-count">x '.$value['quantity'].'</span>
	                          <strong><a href="shop-item.html">'.$value['name'].'</a></strong>
	                          <em>$'.number_format($value['price'],0,'','.').'</em>
	                          <a href="javascript:void(0);" class="del-goods del-cart-top" data-id="'.$value['id'].'">&nbsp;</a>
	                        </li>';
	            }
	            $total_cart 	= $this->cart->total();
				$total_item 	= $this->cart->totalItems();
				$total_unique 	= $this->cart->totalUniqueItems();
				$data_mess = array(
					'status'		=>$status,
					'mess'			=>$mess,
					'html'			=> $html,
					'total_cart'	=> '$ '.number_format($total_cart,0,'','.'),
					'total_item'	=> $total_item,
					'total_unique'	=> $total_unique.' item'
				);
				echo json_encode($data_mess);
			}
			


			
		}
	}
	public function ajaxRemoveItemCart(){
		if (isset($_POST['id']) && is_numeric($_POST['id'])) {
			foreach ($this->cart->contents() as $item) {
				if ($item->id ==$_POST['id']) {
					$item->remove();
					$status = true;
					$mess = lang('remove_item_to_cart');
					$total_cart 	= $this->cart->total();
					$total_item 	= $this->cart->totalItems();
					$total_unique 	= $this->cart->totalUniqueItems();
					$data_mess = array(
						'status'		=>$status,
						'mess'			=>$mess,
						'total_cart'	=> '$ '.number_format($total_cart,0,'','.'),
						'total_item'	=> $total_item,
						'total_unique'	=> $total_unique.' item'
					);
					echo json_encode($data_mess);
				}
			}
		}
	}

	public function cart(){
		global $_web;

		$this->view->data['cart'] 			=& $this->cart->contents(true);
		foreach ($this->view->data['cart'] as $key => $value) {
			$this->view->data['cart'][$key]['total'] = $value['price'] * $value['quantity'];
		}
		$this->view->data['total_cart'] 	= $this->cart->total();
		$this->view->data['total_item'] 	= $this->cart->totalItems();
		$this->view->data['total_unique'] 	= $this->cart->totalUniqueItems();

		$this->view->render('cart_view');
	}
	
}
<?php 
class ProductController extends Controller{
	public $modelProduct;
	public $modelCategory;
	public function __construct(){
		parent::__construct();
		$this->modelCategory = $this->loadModel('Category');
		$this->modelProduct = $this->loadModel('Product');
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
		$this->view->data['data_category']   = $this->modelCategory->getCategories();
		$this->view->data['data_product_related']   = $this->modelProduct->list_product(0, 20,$id = null,$where_search = null);
		$this->view->data['more_product_related']   = $this->modelProduct->check_load_more_product(20);



		$this->view->render('add_product');
	}
	public function save(){
		if (isset($_POST['submit'])) {
			
			$title = htmlentities($this->input->post('title'),ENT_QUOTES);
			$code = htmlentities($this->input->post('code'),ENT_QUOTES);
			$description = htmlentities($this->input->post('description'),ENT_QUOTES);
			$price = htmlentities($this->input->post('price'),ENT_QUOTES);
			$saleoff = htmlentities($this->input->post('saleoff'),ENT_QUOTES);
			$vat = htmlentities($this->input->post('vat'),ENT_QUOTES);
			$time_start = htmlentities($this->input->post('time_start'),ENT_QUOTES);
			$time_end = htmlentities($this->input->post('time_end'),ENT_QUOTES);
			$content = htmlentities($this->input->post('content'),ENT_QUOTES);
			$note = htmlentities($this->input->post('note'),ENT_QUOTES);
			$meta_keyword = htmlentities($this->input->post('meta_keyword'),ENT_QUOTES);
			$meta_description = htmlentities($this->input->post('meta_description'),ENT_QUOTES);
			$state = htmlentities($this->input->post('state'),ENT_QUOTES);
			$brand = htmlentities($this->input->post('brand'),ENT_QUOTES);
			$avatar = trim(addslashes($this->input->post('avatar')));
			$categories = $this->input->post('categories');
			if (is_array($categories)) {
				$cate = ",".implode(",",$categories).",";
			}
			$image_arr = array();
			for ($i=0; $i < count($_POST['images_js']); $i++) { 
				$image_arr[] = array(
						'name' => $_POST['images_js'][$i],
						'att_title' => $_POST['att_title'][$i],
						'att_alt' => $_POST['att_alt'][$i],

					);
			}
			$images = json_encode($image_arr);


			$info_arr = array();
			for ($i=0; $i < count($_POST['info_title']); $i++) { 
				$info_arr[] = array(
						'title' => $_POST['info_title'][$i],
						'content' => $_POST['info_content'][$i],

					);
			}
			$other_info = json_encode($info_arr);

			$timestamp_start = $time_start ? \DateTime::createFromFormat('d/m/Y', $time_start)->getTimestamp() : '';
			$timestamp_end = $time_end ? \DateTime::createFromFormat('d/m/Y', $time_end)->getTimestamp() : '';
			$data_basic = array(
				'name'	=> $title,
				'alias'	=> alias($title),
				'category'	=> $cate,
				'code'	=> $code,
				'price'	=> $price,
				'saleoff'	=> $saleoff,
				'time_start'	=> $timestamp_start,
				'time_end'	=> $timestamp_end,
				'status_vat'	=> $vat,
				'state'			=> $state,
				'other_info'	=> $other_info,
				'short_info'	=> $description,
				'image'			=> $avatar,
				'status'		=> 1,
				'brand'		=> $brand,
			);
			if (isset($_POST['id_product']) && is_numeric($_POST['id_product'])) { // như thế này là đang update
				$data_basic['update_author'] 	= Session::get('id');
				$data_basic['update_time'] 	= time();
				$this->modelProduct->update($data_basic,$_POST['id_product']);
				$mess = array(
					'flash_success' => lang('update_page_success'),
				);
			}else{ // như thế này là đang insert
				$data_basic['create_author'] 	= Session::get('id');
				$data_basic['create_time'] 	= time();
				$id = $this->modelProduct->insertData($data_basic);
				$data_images = array(
					'id_product'	=> $id,
					'avatar'	=> $avatar,
					'image'	=> $images
				);
				$this->modelProduct->insertDataImage($data_images);

				$data_detail = array(
					'id_product'	=> $id,
					'full_info'	=> $content,
					'meta_title'	=> $title,
					'meta_keyword'	=> $meta_keyword,
					'meta_description'	=> $meta_description,
				);
				$this->modelProduct->insertDataDetail($data_detail);

				$mess = array(
					'flash_success' => lang('insert_page_success'),
				);
			}
			
            Session::create($mess);
            if ($_POST['submit']=='save') {
            	redirect(base_url().'product/product/index');
            }else{
            	redirect(base_url().'product/product/add');
            }
            
		}






	}
	public function edit(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			if ($this->modelProduct->checkId($_GET['id']) == FALSE) {
				$this->view->data['data']=$this->modelProduct->getDataById($_GET['id']);
				foreach ($this->view->data['data'] as $key => $value) {
					if ($key=='time_start') {
						$this->view->data['data'][$key] = date('d/m/Y',$value);
					}
					if ($key=='time_end') {
						$this->view->data['data'][$key] = date('d/m/Y',$value);
					}
				}
				$this->view->data['data_detail']=$this->modelProduct->getDataDetailById($_GET['id']);
				$this->view->data['data_images']=$this->modelProduct->getDataImageById($_GET['id']);
				$this->view->data['data_category']   = $this->modelCategory->getCategories();
				if (isset($this->view->data['data']['other_info'])) {
					$this->view->data['data_other_info'] = json_decode($this->view->data['data']['other_info']);
				}
				if (!empty($this->view->data['data_images'])) {
					$this->view->data['data_images']['image'] = json_decode($this->view->data['data_images']['image']);
				}
				$this->view->render('add_product');
			}
		}
	}


	public function addInfo(){
		if (isset($_POST['status']) && $_POST['status']==true) {
			$html = '<div class="element-info">
						<div class="col-md-5 noPadding">
					        <input type="text" class="form-control maxlength-handler" name="info_title[]" maxlength="60" placeholder="Nhập tiêu đề...">
					    </div>
					    <div class="col-md-5">
					        <input type="text" class="form-control maxlength-handler" name="info_content[]" maxlength="120" placeholder="Nhập nội dung...">
					    </div>
					    <div class="col-md-2" style="padding:0px">
					        <a href="javascript:void(0)" class="btn green add_info" style="border-radius:3px !important"><i class="fa fa-plus"></i></a>
					    </div>
						<div class="clearfix" style="margin:8px 0px;"></div>
					</div>';
			echo $html;
		}
	}
	
	public function addImagesProduct(){
		if (!empty($_POST['list'])) {
			$list = $_POST['list'];
			$i = 1;
			$html='';
			foreach ($list as $key => $value) {
				$url = base_url().'tmp/cdn/'.$value;
				$html .= '<li>
							<div class="imgs">
								<img src="'.$url.'" class="handle">
								<a href="javascript:void(0)" class="btn btn-xs green select_avatar" data-img="'.$value.'" data-choose-avatar="'.lang('choose_avatar').'" data-message="'.lang('selected').'">'.lang('choose_avatar').'</a>
		                        <a href="javascript:void(0)" class="btn btn-xs red delete_image" data-title="'.lang('notification').'" data-message="'.lang('mess_remove_image').'" data-agree="'.lang('agree').'" data-cancel="'.lang('cancel').'" data-lang="vi">'.lang('delete_image').'</a>
							</div>
						    <input type="hidden" name="images_js[]" value="'.$value.'" />
						    <input type="text" name="att_title[]" class="form-control" maxlength="100" placeholder="'.lang('title_image').'">
						    <textarea name="att_alt[]" class="form-control" maxlength="150" placeholder="'.lang('descript_image').'"></textarea>
					  </li>';
			}
			$data = array(
				'status'	=> true,
				'html'		=> $html
			);
			echo json_encode($data);
		}

	}
	public function ajaxLoadMore(){
		//$data = array();
		$status = false;
		$start                         = $_POST['data']['start'];
		$arrid                         = ($_POST['data']['id_related']!="") ? explode(',', $_POST['data']['id_related']) : null;
		$list_product_related = $this->modelProduct->list_product($start, 20, $arrid);
		$more_product_related = $this->modelProduct->check_load_more_product($start + 20, true, $arrid);
		$html = '';
		foreach ($list_product_related as $key => $value) {
			$html .='<li class="select-product" data-id="'.$value['id'].'">
                    	<div class="imgs">
                    		<img src="'.base_url().'tmp/cdn/'.$value['image'].'" alt="'.$value['name'].'"/>
                    	</div>
                    	<a>'.$value['name'].'</a>
                	</li>';
		}
		if (!empty($list_product_related)) {
			$status = true;
		}
		$data =array(
			'status'	=> $status,
			'flag'		=> $more_product_related['flag'],
			'start'		=> $more_product_related['start'],
			'ajax'		=> $more_product_related['ajax'],
			'html'		=> $html
		);
		echo json_encode($data);
	}
	public function ajaxSearchProductRelated(){
		$status = false;
		$text                          = htmlentities($_POST['data']['text'],ENT_QUOTES);
		$arrid                         = ($_POST['data']['id_related']!="") ? explode(',', $_POST['data']['id_related']) : null;
		$list_product_related 			= $this->modelProduct->search_product($text, $arrid);
		$html = '';
		foreach ($list_product_related as $key => $value) {
			$html .='<li class="select-product" data-id="'.$value['id'].'">
                    	<div class="imgs">
                    		<img src="'.base_url().'tmp/cdn/'.$value['image'].'" alt="'.$value['name'].'"/>
                    	</div>
                    	<a>'.$value['name'].'</a>
                	</li>';
		}
		if (!empty($list_product_related)) {
			$status = true;
		}
		$data =array(
			'status'	=> $status,
			'html'		=> $html
		);
		echo json_encode($data);
	}
	
}
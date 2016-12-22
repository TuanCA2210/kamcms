<?php 
class ProductController extends Controller{
	public $modelProduct;
	public $modelCategory;
	public $modelBrand;
	public function __construct(){
		parent::__construct();
		$this->modelCategory = $this->loadModel('Category');
		$this->modelProduct = $this->loadModel('Product');
		$this->modelBrand = $this->loadModel('Brand');
	}
	public function index(){
		global $_web;
		// Check if there are any SUCCESS messages
		if (isset($_SESSION['flash_success'])) {
			$this->view->data['flash_success'] = Session::get('flash_success');
			unset($_SESSION['flash_success']);
		}
		if (isset($_GET['s']) && $_GET['s']!='') {
			$search = trim(addslashes($_GET['s']));
			$this->view->data['data'] = $this->modelProduct->findSearch($search);
			$this->view->data['s'] = $search;
			$this->view->data['curpage'] = 1;
			$this->view->data['count_page'] = 1;
			$this->view->data['pagination'] ='';
		}else{
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
			$this->view->data['data'] 		= $this->modelProduct->getPagiProduct($start,$limit);
			$this->view->data['curpage'] 	= $curpage;
			$this->view->data['count_page'] = $count_page;
			
			$this->view->data['pagination'] = $paging->pagesList($curpage);  
		}

		$this->view->render('index_product');
	}
	public function del(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = $_GET['id'];
			$this->modelProduct->delete($id);
			$this->modelProduct->deleteDetail($id);
			$this->modelProduct->deleteImage($id);
			$mess = array(
				'flash_success' => lang('delete_success'),
			);
			Session::create($mess);
			redirect(base_url().'product/product/index');
		}
	}
	public function dellAll(){
		if (isset($_POST['all'])) {
			if (!empty($_POST['all']) &&  is_array($_POST['all'])) {
                $names_id = $_POST['all'];
                $this->modelProduct->dellWhereInArray($names_id);
                $this->modelProduct->dellWhereInArrayDetail($names_id);
                $this->modelProduct->dellWhereInArrayImage($names_id);
                $mess = array(
					'flash_success' => lang('delete_all_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'product/product/index'
				);
				echo json_encode($data_mess);
            }
		}
	}
	public function add(){
		global $_web;
		$this->view->data['data_category']   		= $this->modelCategory->getCategories();
		$this->view->data['data_brand']   			= $this->modelBrand->getBrand();
		$this->view->data['data_product_related']   = $this->modelProduct->list_product(0, 20,$id = null,$where_search = null);
		$this->view->data['more_product_related']   = $this->modelProduct->check_load_more_product(20);



		$this->view->render('add_product');
	}
	public function save(){
		if (isset($_POST['submit'])) {
			
			$title 				= trim(addslashes($this->input->post('title')));
			$code 				= trim(addslashes($this->input->post('code')));
			$description 		= trim(addslashes($this->input->post('description')));
			$price 				= trim(addslashes(str_replace(".","",$this->input->post('price'))));
			$saleoff 			= trim(addslashes(str_replace(".","",$this->input->post('saleoff'))));
			$vat 				= trim(addslashes($this->input->post('vat')));
			$time_start 		= trim(addslashes($this->input->post('time_start')));
			$time_end 			= trim(addslashes($this->input->post('time_end')));
			$content 			= htmlentities($this->input->post('content'),ENT_QUOTES);
			$note 				= trim(addslashes($this->input->post('note')));
			$meta_keyword 		= trim(addslashes($this->input->post('meta_keyword')));
			$meta_description 	= trim(addslashes($this->input->post('meta_description')));
			$state 				= trim(addslashes($this->input->post('state')));
			$brand 				= trim(addslashes($this->input->post('brand')));
			$avatar 			= trim(addslashes($this->input->post('avatar')));
			$categories 		= $this->input->post('categories');
			if (is_array($categories)) {
				$cate = ",".implode(",",$categories).",";
			}
			$image_arr = array();
			for ($i=0; $i < count($_POST['images_js']); $i++) { 
				$image_arr[] = array(
						'name' 		=> $_POST['images_js'][$i],
						'att_title' => $_POST['att_title'][$i],
						'att_alt' 	=> $_POST['att_alt'][$i],

					);
			}
			$images = json_encode($image_arr);


			$info_arr = array();
			for ($i=0; $i < count($_POST['info_title']); $i++) { 
				$info_arr[] = array(
						'title' 	=> $_POST['info_title'][$i],
						'content' 	=> $_POST['info_content'][$i],

				);
			}
			$other_info 		= json_encode($info_arr);
			$timestamp_start 	= $time_start ? \DateTime::createFromFormat('d/m/Y', $time_start)->getTimestamp() : '';
			$timestamp_end 		= $time_end ? \DateTime::createFromFormat('d/m/Y', $time_end)->getTimestamp() : '';


			// product related
			$related = array(
				'category' => array(
					'status'   => trim(addslashes($_POST['status_related_category'])),
					'sort'     => trim(addslashes($_POST['sort_related_category'])),
					'display'  => trim(addslashes($_POST['display_related_category'])),
					'order_by' => trim(addslashes($_POST['order_by_related_category'])),
					'number'   => trim(addslashes($_POST['number_related_category'])),
				),
				'brand'    => array(
					'status'   => trim(addslashes($_POST['status_related_brand'])),
					'sort'     => trim(addslashes($_POST['sort_related_brand'])),
					'display'  => trim(addslashes($_POST['display_related_brand'])),
					'order_by' => trim(addslashes($_POST['order_by_related_brand'])),
					'number'   => trim(addslashes($_POST['number_related_brand'])),
				),
				'price'    => array(
					'status'   => trim(addslashes($_POST['status_related_price'])),
					'sort'     => trim(addslashes($_POST['sort_related_price'])),
					'display'  => trim(addslashes($_POST['display_related_price'])),
					'order_by' => trim(addslashes($_POST['order_by_related_price'])),
					'number'   => trim(addslashes($_POST['number_related_price'])),
					'range'    => str_replace('.', '', $_POST['range_related_price']),
				),
				'select'   => array(
					'status'     => trim(addslashes($_POST['status_related_select'])),
					'sort'       => trim(addslashes($_POST['sort_related_select'])),
					'display'    => trim(addslashes($_POST['display_related_select'])),
					'order_by'   => trim(addslashes($_POST['order_by_related_select'])),
					'id_related' => str_replace(',', '|', $_POST['product_related']),
				),
			);

			// brand
			if (!empty($_POST['brand'])) {
				$brand = '|' . implode('|', $_POST['brand']) . '|';
			} else {
				$brand = '';
			}
			// state
			if (!empty($_POST['state'])) {
				$state = '|' . implode('|', array_filter($_POST['state'])) . '|';
			} else {
				$state = 0;
			}

			$data_basic = array(
					'name'			=> $title,
					'alias'			=> alias($title),
					'category'		=> $cate,
					'code'			=> $code,
					'price'			=> $price,
					'saleoff'		=> $saleoff,
					'time_start'	=> $timestamp_start,
					'time_end'		=> $timestamp_end,
					'status_vat'	=> $vat,
					'state'			=> $state,
					'other_info'	=> $other_info,
					'short_info'	=> $description,
					'image'			=> $avatar,
					'status'		=> 1,
					'brand'			=> $brand,
					'note'			=> $note,
			);
			if (isset($_POST['id_product']) && is_numeric($_POST['id_product'])) { // như thế này là đang update
				$id_product = $_POST['id_product'];
				$data_basic['update_author'] 	= Session::get('id');
				$data_basic['update_time'] 		= time();
				$this->modelProduct->update($data_basic,$id_product);

				$data_images = array(
					'avatar'	=> $avatar,
					'image'	=> $images
				);
				$this->modelProduct->updateDataImage($data_images,$id_product);

				$data_detail = array(
					'full_info'			=> $content,
					'tags'				=> $meta_keyword,
					'meta_title'		=> $title,
					'meta_keyword'		=> $meta_keyword,
					'meta_description'	=> $meta_description,
					'related_product'	=> json_encode($related)
				);
				$this->modelProduct->updateDataDetail($data_detail,$id_product);

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
					'id_product'		=> $id,
					'full_info'			=> $content,
					'tags'				=> $meta_keyword,
					'meta_title'		=> $title,
					'meta_keyword'		=> $meta_keyword,
					'meta_description'	=> $meta_description,
					'related_product'	=> json_encode($related)
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
			$id = $this->input->get('id');
			if ($this->modelProduct->checkId($id) == FALSE) {
				$this->view->data['data']			=	$this->modelProduct->getDataById($id);
				$this->view->data['data_detail']	=	$this->modelProduct->getDataDetailById($id);
				$this->view->data['data_images']	=	$this->modelProduct->getDataImageById($id);
				$this->view->data['data_brand']   	= 	$this->modelBrand->getBrand();
				$this->view->data['data_detail']['related_product'] = json_decode($this->view->data['data_detail']['related_product'],true);
				// get list product related
				if (!empty($this->view->data['data_detail'])) {
					$arrid = explode('|', $this->view->data['data_detail']['related_product']['select']['id_related']);
					$arr_list_selected = array();
					foreach ($arrid as $value) {
						$arr_list_selected[] = $this->modelProduct->list_product_selected($value);
					}
					$this->view->data['arr_list_selected'] = $arr_list_selected;
					$this->view->data['data_product_related_active'] = implode(",",$arrid);
					array_push($arrid,$id);
					$this->view->data['data_product_related']   = $this->modelProduct->list_product(0, 20,$arrid,$where_search = null);

				}
				
				foreach ($this->view->data['data'] as $key => $value) {
					if ($key=='time_start') {
						$this->view->data['data'][$key] = ($this->view->data['data'][$key]!=0) ? date('d/m/Y',$value) : "";
					}
					if ($key=='time_end') {
						$this->view->data['data'][$key] = ($this->view->data['data'][$key]!=0) ? date('d/m/Y',$value) : "";
					}
				}
				
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
		$text                          = trim(addslashes($_POST['data']['text']));
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
	public function ajaxAddBrand(){
		if (isset($_POST['title'])) {
			$title = trim(addslashes($this->input->post("title")));
			$alias = alias($title);
			$data_insert = array(
				'name'	=> $title,
				'alias'	=> $alias,
				'create_time'	=> time(),
				'create_author'	=> Session::get('id')
			);
			$id = $this->modelBrand->insertData($data_insert);
			$data = array(
				'status'	=> true,
				'id'		=> $id,
				'title'		=> $title
			);
			echo json_encode($data);
		}
	}
	public function ajaxDeleteBrand(){
		if (isset($_POST['id']) && is_numeric($_POST['id'])) {
			$id = $_POST['id'];
			$this->modelBrand->delete($id);
			$data = array(
				'status'	=> true,
				'id'		=> $id
			);
			echo json_encode($data);
		}
	}
	public function status(){
		if (isset($_POST['status'])) {
			if (!empty($_POST['all']) &&  is_array($_POST['all'])) {
                $names_id = $_POST['all'];
                if ($_POST['status']=='public') {
                	$data = array(
                		'status' => 1
                	);
                }else{
                	$data = array(
                		'status' => 0
                	);
                }
                foreach ($names_id as $value) {
                	$this->modelProduct->update($data,$value);
                }
                $mess = array(
					'flash_success' => lang('status_pages_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'product/product/index'
				);
				echo json_encode($data_mess);
            }
		}
	}
	
}
<?php 
class MediaController extends Controller{
	public $modelImages;
	//public $loadPages;
	public function __construct(){
		parent::__construct();
		$this->modelImages = $this->loadModel('media');
	}
	public function index(){
		global $_web;
		//$this->view->data['images']  = $this->modelImages->getAllImages();

		$this->view->render('index');
	}
	public function userOnline(){
		//$my_ip = getHostByName(php_uname('n'));
		$my_ip = getIP();
		echo $my_ip;die;
		/*$my_url = $_SERVER['PHP_SELF'];

		$sql = "SELECT * FROM online WHERE ip = '".$my_ip."'";
		$count = $database->count_query($sql);
		$data = array(
		  'ip'  => $my_ip,
		  'url' => $my_url,
		  'time'  => time()
		);
		if ($count>0) {
		  $where = array(
		    array('ip',$my_ip,'and'),
		        array('url',$my_url)
		  );
		  $database->update('online',$data,$where);
		}else{
		  // nếu chưa có ip trong database thì thêm địa chỉ ip mới vào
		  $database->insert('online',$data);

		}
		$time = time();
		$database->delete_sql("DELETE FROM online WHERE `time` + 1 < $time");

		// Select
		$data_ip = $database->query("SELECT * FROM online");


		if (isset($data_ip) && !empty($data_ip)) {
		  echo "<pre>";
		  print_r($data_ip);
		  echo "</pre>";
		}*/
	}
	public function setLang(){
		$lang = $this->input->post('lang');
		//Session::create(array('lang'=> $lang));
		$cookie_name = "lang";
		$cookie_value = $lang;
		setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day




		$data = array(
			'status' => true,
			'mess'	 => 'Success'
		);
		
		echo json_encode($data);
	}

	public function uploadImages(){
		$html = '';
		if (isset($_POST)) {
			if (isset($_FILES['media'])) {
				$handle = new upload($_FILES['media']);
				if ($handle->uploaded) {
				  //$handle->file_new_name_body   = 'image_resized';
				  //$handle->image_resize         = true;
				  //$handle->image_x              = 100;
				  //$handle->image_ratio_y        = true;
				  $dir          = DIR_TMP.'cdn/';
				  $handle->process($dir);
				  if ($handle->processed) {
                    $ImagesA = getImagesToFolder($dir);
                    
                    if (!empty($ImagesA)) {
                    	foreach ($ImagesA as $key => $value) {
	                      $html .= "<div class='media-col'>";
	                      $html .= "<div class='overflow'><a class='fancybox' href='".base_url()."tmp/cdn/".$value."'><i class='demo-icon icon-eye'>&#xe801;</i></a></div>";
	                      $html .= "<img class='img-folder-media' src='".base_url().'tmp/public/plugins/image_tools/timthumb.php?src='.base_url()."tmp/cdn/".$value."&h=100&w=150&zc=2' width='150' height='100'/>";
	                      $html .= "<div class='text-center'>".$value."</div>";
	                      $html .= "<div class='text-center overcontrol'>
	                      <a href='javascript:void(0)' class='rename' data-title='".$value."'><i class='fa fa-font' aria-hidden='true'></i></a>
	                      <a href='javascript:void(0)' class='delete' data-title='".$value."'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
	                      </div>";
	                      $html .= "</div>";
	                     }
                    }
				    $data = array(
				    	'status'	=> true,
				    	'html'		=> $html,
				    	'mess'		=> lang('notification').lang('uploaded_message')
				    );
				    $handle->clean();
				  } else {
				    $data = array(
				    	'status'	=> false,
				    	'html'		=> $html,
				    	'mess'		=> lang('warning').lang('not_uploaded_message')
				    );
				  }
				}
			}else{
				$data = array(
				    	'status'	=> false,
				    	'html'		=> $html,
				    	'mess'		=> lang('warning').lang('not_uploaded_message')
				    );
			}
			sleep(2);
			echo json_encode($data);
		}
	}
	public function refesh(){
		$html ='';
		$dir          = DIR_TMP.'cdn/';
        $ImagesA = getImagesToFolder($dir);
        if (!empty($ImagesA)) {
        	foreach ($ImagesA as $key => $value) {
              $html .= "<div class='media-col'>";
              $html .= "<div class='overflow'><a class='fancybox' href='".base_url()."tmp/cdn/".$value."'><i class='demo-icon icon-eye'>&#xe801;</i></a></div>";
              $html .= "<img class='img-folder-media' src='".base_url().'tmp/public/plugins/image_tools/timthumb.php?src='.base_url()."tmp/cdn/".$value."&h=100&w=150&zc=2' width='150' height='100'/>";
              $html .= "<div class='text-center'>".$value."</div>";
              $html .= "<div class='text-center overcontrol'>
              <a href='javascript:void(0)' class='rename' data-title='".$value."'><i class='fa fa-font' aria-hidden='true'></i></a>
              <a href='javascript:void(0)' class='delete' data-title='".$value."'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
              </div>";
              $html .= "</div>";
             }
        }
        $data = array(
				    	'status'	=> true,
				    	'html'		=> $html,
				    	'mess'		=> lang('notification').lang('uploaded_message')
				    );
		sleep(2);
		echo json_encode($data);
	}
	public function deleteImage(){
		$html ='';
		$dir          = DIR_TMP.'cdn/';
		if (isset($_POST['title'])) {
			$title = trim(addslashes($_POST['title']));
			if (file_exists($dir.$title)) {
    			unlink($dir.$title);
    		}
    		$ImagesA = getImagesToFolder($dir);
	        if (!empty($ImagesA)) {
	        	foreach ($ImagesA as $key => $value) {
	              $html .= "<div class='media-col'>";
	              $html .= "<div class='overflow'><a class='fancybox' href='".base_url()."tmp/cdn/".$value."'><i class='demo-icon icon-eye'>&#xe801;</i></a></div>";
	              $html .= "<img class='img-folder-media' src='".base_url().'tmp/public/plugins/image_tools/timthumb.php?src='.base_url()."tmp/cdn/".$value."&h=100&w=150&zc=2' width='150' height='100'/>";
	              $html .= "<div class='text-center'>".$value."</div>";
	              $html .= "<div class='text-center overcontrol'>
	              <a href='javascript:void(0)' class='rename' data-title='".$value."'><i class='fa fa-font' aria-hidden='true'></i></a>
	              <a href='javascript:void(0)' class='delete' data-title='".$value."'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
	              </div>";
	              $html .= "</div>";
	             }
	        }
	        $data = array(
					    	'status'	=> true,
					    	'html'		=> $html,
					    	'mess'		=> lang('notification').lang('uploaded_message')
					    );
			sleep(1);
			echo json_encode($data);
		}
	}
	public function renameImage(){
		$dir          = DIR_TMP.'cdn/';
		if (isset($_POST['new_name']) && isset($_POST['old_name'])) {
			$tmp_name = explode(".",$_POST['old_name']);
			if (count($tmp_name)==2) {
				$ext = $tmp_name[1];
				$old_name = $_POST['old_name'];
				$new_name = $_POST['new_name'];
				rename($dir.$old_name,$dir.$new_name.".".$ext);
				$data = array(
					'status'	=> true,
					'mess'		=> "Đổi tên thành công."
				);
			}else{
				$data = array(
					'status'	=> false,
					'mess'		=> "Đổi tên thất bại."
				);
			}
			echo json_encode($data);
		}
	}
	
}
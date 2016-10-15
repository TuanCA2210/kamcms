<?php 
class OptionsController extends Controller{
	public $options;
	//public $loadPages;
	public function __construct(){
		parent::__construct();
		$this->options = $this->loadModel('Options');
	}
	public function index(){
		global $_web;
		if (isset($_SESSION['flash_success'])) {
			$this->view->data['flash_success'] = Session::get('flash_success');
			unset($_SESSION['flash_success']);
		}

		if (isset($_POST['ok'])) {
			$pagination_number = (is_numeric($this->input->post('pagination_number'))) ? $this->input->post('pagination_number') : 10;
			
			$data_insert = array(
				'pagination_number'	=> $pagination_number
			);
			$this->options->update($data_insert);

			$mess = array(
					'flash_success' => lang('update_page_success'),
				);			
            Session::create($mess);
            redirect(base_url().'options/options/index');
		}

		$this->view->data['options']  = $this->options->getInfo();

		$this->view->render('index');
	}
	
}
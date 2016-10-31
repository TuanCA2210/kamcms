<?php 
use Widop\GoogleAnalytics\Query;
use Widop\GoogleAnalytics\Client;
use Widop\HttpAdapter\CurlHttpAdapter;
use Widop\GoogleAnalytics\Service;



class HomeController extends Controller{
	public $modelNews;
	//public $loadPages;
	public function __construct(){
		parent::__construct();
		$this->modelNews = $this->loadModel('Home');
	}
	public function index(){
		global $_web;
		$this->view->data  = $this->modelNews->getUserById(1);


		$profileId = 'ga:asiatoday';
		$query = new Query($profileId);

		$query->setStartDate(new \DateTime('-2months'));
		$query->setEndDate(new \DateTime());

		// See https://developers.google.com/analytics/devguides/reporting/core/dimsmets
		$query->setMetrics(array('ga:visits' ,'ga:bounces'));
		$query->setDimensions(array('ga:browser', 'ga:city'));

		// See https://developers.google.com/analytics/devguides/reporting/core/v3/reference#sort
		$query->setSorts(array('ga:country', 'ga:browser'));

		// See https://developers.google.com/analytics/devguides/reporting/core/v3/reference#filters
		$query->setFilters(array('ga:browser=~^Firefox'));

		// See https://developers.google.com/analytics/devguides/reporting/core/v3/reference#segment
		$query->setSegment('gaid::10');

		// Default values :)
		$query->setStartIndex(1);
		$query->setMaxResults(10000);
		$query->setPrettyPrint(false);
		$query->setCallback(null);




		$clientId = '601812918181-2e5ab94vq34t5v41a6f8bakv31a7gv01.apps.googleusercontent.com';
		$privateKeyFile = $this->returnFiles("kamcms-aceea14bc8f4.p12");
		$httpAdapter = new CurlHttpAdapter();

		$client = new Client($clientId, $privateKeyFile, $httpAdapter);
		$token = $client->getAccessToken();




		$service = new Service($client);
		$response = $service->query($query);



		$profileInfo = $response->getProfileInfo();
		$kind = $response->getKind();
		$id = $response->getId();
		$query = $response->getQuery();
		$selfLink = $response->getSelfLink();
		$previousLink = $response->getPreviousLink();
		$nextLink = $response->getNextLink();
		$startIndex = $response->getStartIndex();
		$itemsPerPage = $response->getItemsPerPage();
		$totalResults = $response->getTotalResults();
		$containsSampledData = $response->containsSampledData();
		$columnHeaders = $response->getColumnHeaders();
		$totalForAllResults = $response->getTotalsForAllResults();
		$hasRows = $response->hasRows();
		$rows = $response->getRows();
























		

		$this->view->render('index');
	}
	public function userOnline(){
		//$my_ip = getHostByName(php_uname('n'));
		$my_ip = getIp();
		$my_url = $_SERVER['PHP_SELF'];

		/*$sql = "SELECT * FROM online WHERE ip = '".$my_ip."'";
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
	public function notfound(){
		$this->view->render('404',false);
	}

	/*public function __destruct(){
		$this->loadView();
	}*/
	
}
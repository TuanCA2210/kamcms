<?php 
session_start();
require_once "system/debug.php";
define('DIR_ROOT',dirname(__FILE__).DIRECTORY_SEPARATOR);
//define('DIR_CONFIG',DIR_ROOT.'config/');
define('DIR_TMP',DIR_ROOT.'tmp/');
define('DIR_LOG',DIR_ROOT.'logs/');
define('DIR_THEME',DIR_ROOT.'themes/');
define('DIR_MODULES',DIR_ROOT.'modules/');
define('DIR_APP',DIR_ROOT.'app/');
define('DIR_PUBLIC',DIR_ROOT.'tmp/public/');

require_once "system/globals.php";









/*$model = new system\Model("online");
$data = $model->get();



$data_arr = array(
	'id'	=> 1,
	'name'	=> 'Le Ngoc Cuong'
);
Session::create($data_arr);*/




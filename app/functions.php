<?php 
/*
* author: Lê Ngọc Cường
* mail: cuongle.dev@gmail.com
* 2016
*/
function db_connect($_mod=null){
	global $_LNC,$_web;
	if($_mod == null){
		$_web['db'] = new MysqliDb ($_LNC['db_host'], $_LNC['db_user'], $_LNC['db_password'], $_LNC['db_name'],$_LNC['db_charset'],$_LNC['db_port']) ;
	}
}
function lang($key) {
	global $_L; 
	if(isset($_L[$key])) {
		$result = $_L[$key];
	}else {
		$result = "Chưa tồn tại ngôn ngữ để hiển thị.";
	}
	return $result;
}
function base_url(){
	global $_web;
	return $_web['base_url'];
}
function redirect($url){
	header("location: $url");
	exit;
}

function dd($a){
	echo "<pre>";
	print_r($a);
	echo "</pre>";
	die(" Die !!!");
}
function de($a){
	echo "<pre>";
	print_r($a);
	echo "</pre>";
}
function getIP()
{
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key)
    {
        if (array_key_exists($key, $_SERVER) === true)
        {
            foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip)
            {
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false)
                {
                    return $ip;
                }
            }
        }
    }
}



function base64url_encode($data) { 
  return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
} 

function base64url_decode($data) { 
  return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
}



/**
 * @return chuỗi tiếng việt không dấu
 */
function strU($str){
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    $str = preg_replace("/[^A-Za-z0-9 ]/", ' ', $str);
    $str = preg_replace("/\s+/", ' ', $str);
    $str = trim($str);
    return $str;
}
/**
 * @return link SEO
 */
function alias($str){
    $str = strU($str);
    $str = strtolower($str);    
    $str = str_replace(' ', '-', $str);
    $str = str_replace('~', '', $str);
    $str = str_replace('{', '', $str);
    $str = str_replace('}', '', $str);
    $str = str_replace('[', '', $str);
    $str = str_replace(']', '', $str);
    $str = str_replace(':', '', $str);
    $str = str_replace('\'', '', $str);
    $str = str_replace('\\', '', $str);
    $str = str_replace('(', '', $str);
    $str = str_replace(')', '', $str);
    $str = str_replace('*', '', $str);
    $str = str_replace('&', '', $str);
    $str = str_replace('^', '', $str);
    $str = str_replace('%', '', $str);
    $str = str_replace('$', '', $str);
    $str = str_replace('#', '', $str);
    $str = str_replace('@', '', $str);
    $str = str_replace('!', '', $str);
    $str = str_replace('`', '', $str);
    $str = str_replace('.', '', $str);
    $str = str_replace(' ', '-', $str);
    return $str;
}

function replaceAdmin($link=null){
    if ($link!=null) {
        return str_replace("/cadmin/", "/", $link);
    }
}
function recursiveMenu($data,$parent=0){
    if (isset($data[$parent])) {
        if ($parent==0) {
            echo "<ul class='nav navbar-nav navbar-right'>";
        }else{
            echo "<ul class='dropdown-menu'>";
        }
        foreach ($data[$parent] as $k=>$value) {
                $id=$value['id'];
                if (isset($data[$id])) {
                    echo "<li class='dropdown'>";
                }else{
                    echo "<li>";
                }
                if (isset($data[$id])) {
                    echo "<a href='".$value['link']."' class='dropdown-toggle' data-toggle='dropdown'>".$value['title']."&nbsp;<b class='caret'></b></a>";
                }else{
                    echo "<a href='".$value['link']."'>".$value['title']."</a>";
                }
                unset($data[$k]);
                recursiveMenu($data,$id);
            echo "</li>";
        }
        echo "</ul>";
    }
    
}


function createCaptcha(){
    $ranStr = getRandomWord();
    $_SESSION["captcha"] = strtolower($ranStr);


    $height = 35; //CAPTCHA image height
    $width = 150; //CAPTCHA image width
    $font_size = 24; 

    $image_p   = imagecreate($width, $height);
    $graybg    = imagecolorallocate($image_p, 245, 245, 245);
    $textcolor = imagecolorallocate($image_p, 34, 34, 34);
    header("Expires: Wed, 1 Jan 1997 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    ob_start("callback"); 
    // $debugLog = ob_get_contents(); 
    ob_end_clean();
    //send image to browser
    header ("Content-type: image/gif");
    imagefttext($image_p, $font_size, -2, 15, 26, $textcolor, DIR_PUBLIC.'root/fonts/mono.ttf', $ranStr);
    //imagestring($image_p, $font_size, 5, 3, $ranStr, $white);
    imagepng($image_p);
    

}
function checkCaptcha($cap){
    if ($_SESSION['captcha'] == strtolower($cap)) {
        return true;
    }else {
        return false;
    }

}
function getRandomWord($len = 5) {
    $word = array_merge(range('0', '9'), range('a', 'z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}
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
function replaceAdmin($link=null){
    if ($link!=null) {
        return str_replace("/cadmin/", "/", $link);
    }
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

function getImagesToFolder($dir){
    $ImagesArray = [];
    $file_display = [ 'jpg', 'jpeg', 'png', 'gif' ];

    if (file_exists($dir) == false) {
        return ["Directory \'', $dir, '\' not found!"];
    } 
    else {
        $dir_contents = scandir($dir);
        foreach ($dir_contents as $file) {
            $file_type = pathinfo($file, PATHINFO_EXTENSION);
            if (in_array($file_type, $file_display) == true) {
                $ImagesArray[] = $file;
            }
        }
        return $ImagesArray;
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


function callMenu($data,$parent=0,$text="-",$select=0){
    foreach($data as $k=>$value){
        if($value['parent_id'] == $parent){
            $id=$value['id'];
            if($select != 0 && $id == $select){
                echo "<option value='$value[id]' selected='selected'>".$text." ".$value['title']."</option>";
            }else{
                echo "<option value='$value[id]'>".$text." ".$value['title']."</option>";
            }
            unset($data[$k]);
            callMenu($data,$id,$text."--",$select);
        }
    }
}

function listCategories($data,$parent=0,$text="-",$select=0){
    if ($parent==0) {
       echo '<ul class="list-item" data-type="'.lang('categories').'">';
    }else{
        echo '<ul>';
    }
    
    foreach($data as $k=>$value){
        if($value['parent_id'] == $parent){
            $id=$value['id'];
            echo "<li><a data-title='".$value['title']."' data-alias='".$value['alias']."' data-id='".$value['id']."' href='#' data-link='".replaceAdmin(base_url().$value['alias'].'-c'.$value['id'].'.htm')."'>".$value['title']."</a></li>";
            unset($data[$k]);
            listCategories($data,$id,$text."--",$select);
        }
    }
    echo '</ul>';
}


function dequy($data,$parent=0,$text=0,$cate=array()){
    foreach($data as $k=>$value){
        if($value['parent_id'] == $parent){
            $id = $value['id'];
            if (isset($value['sort']) && $value['sort']!='') {
                   $sort = $value['sort'];
            }else{
                $sort=0;
            }
            if (!empty($cate)) {
               $x = (in_array($id, $cate)) ? 'checked' : '';
               echo '<li style="margin-left:'.$text.'px;" class="dd-item post-item closed" data-type="'.$value['type'].'" data-relatedid="6" data-title="'.$value['title'].'" data-sort="'.$sort.'" data-id="'.$id.'" data-url="'.$value['link'].'" data-iconfont="'.$value['icon_font'].'" data-class="'.$value['css_class'].'" data-parent="'.$value['parent_id'].'">
                                                            <div class="dd-handle"></div>
                                                            <div class="dd-content">
                                                                <span class="text pull-left" data-update="title">'.'&nbsp;'.$value['title'].'</span>
                                                                <span class="text pull-right">'.$value['type'].'</span>
                                                                <a href="#" title="" class="show-item-details"><i class="fa fa-angle-down"></i></a>
                                                                <div class="clearfix"></div>
                                                            </div>

                                                            <div class="item-details">

                                                                <label class="pad-bot-5">
                                                                    <span class="text pad-top-5 dis-inline-block">'.lang('title').'</span>
                                                                    <input type="text" id="title" name="title" value="'.$value['title'].'" data-old="'.$value['title'].'" class="form-control"/>
                                                                </label>

                                                                <label class="pad-bot-5">
                                                                    <span class="text pad-top-5 dis-inline-block">'.lang('link').'</span>
                                                                    <input type="text" id="link" name="link" value="'.$value['link'].'" data-old="'.$value['link'].'" placeholder="http://" class="form-control"/>
                                                                </label>

                                                                <label class="pad-bot-5">
                                                                    <span class="text pad-top-5 dis-inline-block">'.lang('sort').'</span>
                                                                    <input type="number" id="sort" name="sort" value="'.$value['sort'].'" data-old="" class="form-control"/>
                                                                </label>

                                                                <label class="pad-bot-5">
                                                                    <span class="text pad-top-5 dis-inline-block">CSS class</span>
                                                                    <input type="text" id="css_class" name="class" value="" data-old="" class="form-control"/>
                                                                </label>
                                                                
                                                                <div class="text-right button_update_menu">
                                                                    <a href="#" class="btn btn-info btn-sm">
                                                                        <i class="fa fa-retweet" aria-hidden="true"></i>&nbsp;
                                                                        '.lang('update').'</a>

                                                                    <a href="#" class="btn btn-danger btn-sm">
                                                                        <i class="fa fa-times" aria-hidden="true"></i>&nbsp;
                                                                        '.lang('remove').'</a>

                                                                    <a href="#" class="btn btn-success btn-sm">'.lang('cancel').'</a>
                                                                </div>

                                                            </div>




                                                            
                                                            <div class="clearfix"></div>
                                                        </li>';

            }else{
                echo '<li style="margin-left:'.$text.'px;" class="dd-item post-item closed" data-type="'.$value['type'].'" data-relatedid="6" data-title="'.$value['title'].'" data-sort="'.$sort.'" data-id="'.$id.'" data-url="'.$value['link'].'" data-iconfont="'.$value['icon_font'].'" data-class="'.$value['css_class'].'" data-parent="'.$value['parent_id'].'">
                                                            <div class="dd-handle"></div>
                                                            <div class="dd-content">
                                                                <span class="text pull-left" data-update="title">'.'&nbsp;'.$value['title'].'</span>
                                                                <span class="text pull-right">'.$value['type'].'</span>
                                                                <a href="#" title="" class="show-item-details"><i class="fa fa-angle-down"></i></a>
                                                                <div class="clearfix"></div>
                                                            </div>

                                                            <div class="item-details">

                                                                <label class="pad-bot-5">
                                                                    <span class="text pad-top-5 dis-inline-block">'.lang('title').'</span>
                                                                    <input type="text" id="title" name="title" value="'.$value['title'].'" data-old="'.$value['title'].'" class="form-control"/>
                                                                </label>

                                                                <label class="pad-bot-5">
                                                                    <span class="text pad-top-5 dis-inline-block">'.lang('link').'</span>
                                                                    <input type="text" id="link" name="link" value="'.$value['link'].'" data-old="'.$value['link'].'" placeholder="http://" class="form-control"/>
                                                                </label>

                                                                <label class="pad-bot-5">
                                                                    <span class="text pad-top-5 dis-inline-block">'.lang('sort').'</span>
                                                                    <input type="number" id="sort" name="sort" value="'.$value['sort'].'" data-old="" class="form-control"/>
                                                                </label>

                                                                <label class="pad-bot-5">
                                                                    <span class="text pad-top-5 dis-inline-block">CSS class</span>
                                                                    <input type="text" id="css_class" name="class" value="" data-old="" class="form-control"/>
                                                                </label>
                                                                
                                                                <div class="text-right button_update_menu">
                                                                    <a href="#" class="btn btn-info btn-sm update_menu">
                                                                        <i class="fa fa-retweet" aria-hidden="true"></i>&nbsp;
                                                                        '.lang('update').'</a>

                                                                    <a href="#" class="btn btn-danger btn-sm remove_menu">
                                                                        <i class="fa fa-times" aria-hidden="true"></i>&nbsp;
                                                                        '.lang('remove').'</a>

                                                                    <a href="#" class="btn btn-success btn-sm cancel_menu">'.lang('cancel').'</a>
                                                                </div>

                                                            </div>




                                                            
                                                            <div class="clearfix"></div>
                                                        </li>';
            }
            
            unset($data[$k]);
            dequy($data,$id,$text+20,$cate);
        }
    }
}



/*function __autoload($class){
		$paths = explode(PATH_SEPARATOR, get_include_path());
		$class = str_replace("_","/",$class);
		$file = strtolower(str_replace("\\", DIRECTORY_SEPARATOR, trim($class,"\\"))).".php";
		foreach ($paths as $key => $value) {
			$combited = $value.DIRECTORY_SEPARATOR.$file;
			if (file_exists($combited)) {
				echo $combited;die;
				include($combited);
			}else{
				throw new Exception("Not found $class."); 
			}
		}
}*/

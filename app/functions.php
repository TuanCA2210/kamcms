<?php 
/*
* author: Lê Ngọc Cường
* mail: cuongle.dev@gmail.com
* 2016
*/

if (!function_exists('dd')){
    function dd($a){
        echo "<pre>";
        print_r($a);
        echo "</pre>";
        die(" Die !!!");
    }
}

if (!function_exists('de')){
    function de($a){
        echo "<pre>";
        print_r($a);
        echo "</pre>";
    }
}

if (!function_exists('getRandomWord')){
    function getRandomWord($len = 5) {
        $word = array_merge(range('0', '9'), range('a', 'z'));
        shuffle($word);
        return substr(implode($word), 0, $len);
    }
}
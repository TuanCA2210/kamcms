<?php 
/*
* author: Lê Ngọc Cường
* mail: cuongle.dev@gmail.com
* 2016
*/

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
function getRandomWord($len = 5) {
    $word = array_merge(range('0', '9'), range('a', 'z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}
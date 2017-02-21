<?php

$name = array(
    "self" => "wangzhengyi",
    "student" => array(
        "chenshan",
        "xiaolingang"
    ),
    "unkmow" => "chaikun",
    "teacher" => array(
        "huangwei",
        "fanwenqing"
    )
);
echo arrayTostr($name);
function arrayTostr($arr){
    static $res = array();
    if(is_array($arr)){
        foreach($arr as $val){
            if(is_array($val)){
                arrayTostr($val);
            }else{
                $res[] = $val;
            }
        }
    }elseif(is_string($arr)){
        $res[] = $arr;
    }
    $res = array_unique($res);
    $str = implode(',',$res);
    return $str;
}
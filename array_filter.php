<?php
/**
 * Created by PhpStorm.
 * User: hainan
 * Date: 2017/8/11
 * Time: 20:15
 */

header("content-type:text/html;charset=UTF-8");
// 写一个数组里面有小写a-z 大写A-Z 以及数字,把所有相似的数字和字母都剔除,
// 无论大小写(如:大写I 与 1 或者 大写Z 与 2 或者 小写z 与2  0与o..... )
$arr1 = range(0,9);
$arr2 = range('a','z');
$arr3 = range('A','Z');
$arr = array_merge($arr1,$arr2,$arr3); //合并三个数组
$delElements = array('I','i','1','Z','z','2','o','0','l','O'); //需要剔除的字符
////使用数组遍历来剔除数组
//foreach ($arr as $key => $value) {
//    if(in_array($value, $delElements)) unset($arr[$key]);
//}
var_dump($arr);
$arr = array_filter($arr,function($val)use($delElements){
    if(!in_array($val, $delElements)){
        return $val;
    }
});
echo '<pre>';
var_dump($arr);
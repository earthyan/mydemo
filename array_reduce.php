<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/15
 * Time: 11:20
 */

//$user = array(
//
//    'a' => array(100, 'a1'),
//    'b' => array(101, 'a2'),
//    'c' => array(102, 'a3'),
//    'd' => array(103, 'a4'),
//    'e' => array(104, 'a5'),
//);
////递归调用，降到一组数组 arg[1] function arg[2] 默认值
//$result1 = array_reduce($user, 'array_merge', array('hainan'));
//var_dump($result1);

//$arr = array(
//    array(1,2,3),
//    array(4,5,6)
//);
//
//$result2 = array_reduce($arr, 'array_merge', array());
//var_dump($result2);

//回调函数
$arr = array(
    array('id'=>1,'name'=>'lilei'),
    array('id'=>2,'name'=>'tom'),
    array('id'=>4,'name'=>'hanmei')
);
function minus($output , $v) {
    $output[] = $v['id']; //此时的$v相当于一维数组
    return $output;
}
$new_arr = array_reduce($arr , "minus");
print_r($new_arr); //输出查看下结果
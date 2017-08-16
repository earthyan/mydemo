<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/15
 * Time: 14:44
 */
class hello{
    public static function test(){
        echo 1;
    }

    public function test1(){
        echo 2;
    }
}
error_reporting(E_ALL);
//ini_set('error_reporting',E_STRICT);
hello::test1();
$a = new hello();
$a->test();
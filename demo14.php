<?php

class single{
    //static可以保存值不丢失
    private static $stance;
    //防止外部new对象
    private function __construct(){}
    //防止外部克隆对象
    private function __clone(){
        //当用户clone操作时产生一个错误信息
//        trigger_error("Can't clone object",E_USER_ERROR);
    }
    //这里返回一个单例对象
    static function single(){
        if(null===self::$stance){
            self::$stance = new single();
        }
        return self::$stance;
    }
//这个方法用于测试 或者使用的方法
    function test(){
        echo 'test';
    }
}
$a = single::single();
//$b = clone $a ;
$a->test();
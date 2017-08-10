<?php
/**
 * array_walk和foreach 效率比较
 * */

$begin = microtime(true);
$a = range(1,1000);
array_walk($a,function ($val){
    return $val*2;
});//0.0010001659393311

//foreach ($a as &$val){
//    $val = $val*2;
//}//0.002000093460083

$end = microtime(true);
echo $end-$begin;

/*
 * 固定数组
 * */
//$arr =  new SplFixedArray(10);


/*
 * call_user_func与call_user_func_array()
 * */
require_once "test.php";
call_user_func(array("Call_user",'test'));
function foo()
{
    $numargs = func_num_args();
    echo "Number of arguments: $numargs<br />\n";
    if ($numargs >= 2) {
        echo "Second argument is: " . func_get_arg(1) . "<br />\n";
    }
}

foo (1, 2, 3);
?>
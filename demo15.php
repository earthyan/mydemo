<?php

$arr = feibo(10);
echo $res = feibo_res(3);
function feibo($n){
    $arr = array();
    $arr[0] = 1;
    $arr[1] = 1;
    for($i=2;$i<$n;$i++){
        $arr[$i] = $arr[$i-1]+$arr[$i-2];
    }
    return $arr;
}

function feibo_res($n){
    if($n==1||$n==2){return 1;}
    return feibo_res($n-1)+feibo_res($n-2);
}
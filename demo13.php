<?php
//$arr = array(20,30,50);
//$res = getRand($arr);
//var_dump($res);
//function getRand($arr) {
//    $result = '';
//    //概率数组的总概率精度
//    $Sum = array_sum($arr);
//    //概率数组循环
//    foreach ($arr as $key => $val) {
//        $randNum = mt_rand(1, $Sum);             //抽取随机数
//        if ($randNum <= $val) {
//            $result = $key;                         //得出结果
//            break;
//        } else {
//            $Sum -= $val;
//        }
//    }
//    unset ($arr);
//    return $result;
//}

mb_http_output('utf-8');
$url="http://www.chwfsc.com/";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_HEADER,0);
curl_setopt($ch,CURLOPT_NOBODY, true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_ENCODING,'utf8');
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.47 Safari/536.11');
$html=curl_exec($ch);
curl_close($ch);
var_dump($html);
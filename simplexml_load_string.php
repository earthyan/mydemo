<?php
$begin = microtime(true);
$file = new SplFileObject('nex.log','r');
$phone_arr = [];
while (!$file->eof()){
    $str = $file->fgets();
    $pos = strpos($str,'{');
    $str = substr($str,$pos);
    $arr = json_decode($str,true);
    $req = json_decode($arr['reqt'],true);
    $phone  = $req['data']['phone'];
    $phone_arr[] = $phone;

}
$phone_arr_unique = array_unique($phone_arr);

//foreach ($phone_arr_unique as $val){
//    echo $val.PHP_EOL;
//}
$end = microtime(true);
echo $end-$begin;

//$s = str_repeat('1',255);   //产生由255个1组成的字符串
//$m = memory_get_usage();    //获取当前占用内存
//unset($s);
//$mm = memory_get_usage();   //unset()后再查看当前占用内存
//echo $m-$mm;



//$string = "<xml><ToUserName><![CDATA[toUser]]></ToUserName>
//<FromUserName><![CDATA[fromUser]]></FromUserName>
//<CreateTime>1442401156</CreateTime>
//<MsgType><![CDATA[event]]></MsgType>
//<Event><![CDATA[qualification_verify_success]]></Event>
//<ExpiredTime>1442401156</ExpiredTime>
//</xml>";
//$xml = simplexml_load_string($string, 'SimpleXMLElement', LIBXML_NOCDATA | LIBXML_NOBLANKS);
//$xml = simplexml_load_string($string);
//var_dump($xml);die;
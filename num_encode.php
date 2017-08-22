<?php
if(!function_exists('decodeUid')){
    function decodeUid($code_uid){
        if($code_uid == '95508'){
            return 21895384;
        }
        $code_uid = (string)$code_uid;
        $str_dict = "jb6tr1mgxsvclk4yiwqz2do05anp7fue389h";
        $len = strlen($str_dict);
        $clen = strlen($code_uid);
        $output = 0;
        for($i = 0; $i < $clen; $i++){
            $tmp = strpos($str_dict, $code_uid[$i]);
            if ($tmp === false) {
                return 0;
            }
            $output = $output*$len+$tmp;
        }
        return $output;
    }
}

if(!function_exists('encodeUid')){
    function encodeUid($user_sid){

        $user_sid = intval($user_sid);
        $str_dict = "jb6tr1mgxsvclk4yiwqz2do05anp7fue389h";
        $len = strlen($str_dict);
        $output = '';

        $max_len = 5;
        while ($user_sid>0 || $max_len >0) {
            $i = $user_sid%$len;
            $output = $str_dict[$i] . $output;
            $user_sid = floor($user_sid/$len);
            $max_len--;
        }
        return $output;
    }
}

$encode = encodeUid('601883074');//s9ly9v
echo decodeUid('s9ly9v');

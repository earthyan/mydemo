<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/23
 * Time: 10:56
 */


/*
 * 身份证号码校验规则
 * */
function fixId($idcard) {
    if (strlen($idcard) < 17) {
        return false;
    }
    $idcard_base = substr($idcard, 0, 17);
    $factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
    $verify_code_list = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
    $total = 0;
    for ($i = 0; $i < 17; $i++) {
        $total += substr($idcard_base, $i, 1) * $factor[$i];
    }
    $mod = $total % 11;
    $verify_code = $verify_code_list[$mod];
    return $idcard_base . $verify_code;
}

$str = fixId('420683199502190928');
echo strcasecmp('420683199502190928',$str);
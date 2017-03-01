<?php
/**
 * Created by PhpStorm.
 * User: berry
 * Date: 17/3/1
 * Time: 下午1:46
 */

 $data = array(
     0=>array(
         0=>'id',
         1=>'cid',
         2=>'title'

     ),
     1=>array(
         0=>0,
         1=>0,
         2=>'替换',
     ),
     2=>array(
         0=>1,
         1=>1,
         2=>'测试'
     )
 );
 $keys = array_shift($data);

 $result = array_map(function ($values) use ($keys) {
     return array_combine($keys, $values);
 }, $data);

 print_r($result);
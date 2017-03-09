<?php
/**
 * Created by PhpStorm.
 * User: berry
 * Date: 17/3/9
 * Time: 下午1:40
 */
print_r(date('Y-m-d', strtotime('first mon of january')));
//参考：http://uk3.php.net/manual/zh/...

for($i=1;$i<=52;$i++){
    $month = ($i < 10) ? '0'.$i : $i;
    echo '第'.$i.'周开始：';
    $monday = date('Y-m-d', strtotime('2017W'.$month));
    echo $monday;
    echo '第'.$i.'周结束：';
    $sunday = date('Y-m-d' ,strtotime($monday . '+6day'));
    echo $sunday;
    echo '<br>';
}
//输出：
//
//第1周开始：2017-01-02第1周结束：2017-01-08第2周开始：2017-01-09第2周结束：2017-01-15
//第3周开始：2017-01-16第3周结束：2017-01-22
//第4周开始：2017-01-23第4周结束：2017-01-29
//第5周开始：2017-01-30第5周结束：2017-02-05
//第6周开始：2017-02-06第6周结束：2017-02-12
//第7周开始：2017-02-13第7周结束：2017-02-19
//第8周开始：2017-02-20第8周结束：2017-02-26
//第9周开始：2017-02-27第9周结束：2017-03-05
//
//再次修改：

$months = [
    'january','february','march','april','may','june','july','august ','september','october','november','december'
];
$weeks = [
    '1'=>'first','2'=>'second','3'=>'third','4'=>'fourth'
];
foreach($months as $key=>$value){
    echo $value.'<br>';
    for($i=1;$i<=4;$i++){
        echo '第'.$i.'周：';
        $monday = date('Y-m-d', strtotime($weeks[$i].' monday of '.$value));
        $sunday = date('Y-m-d' ,strtotime($monday . '+6day'));
        echo 'from '.$monday .' to '.$sunday;
        echo '<br>';
    }
}
//january
//第1周：from 2017-01-02 to 2017-01-08
//第2周：from 2017-01-09 to 2017-01-15
//第3周：from 2017-01-16 to 2017-01-22
//第4周：from 2017-01-23 to 2017-01-29
//february
//第1周：from 2017-02-06 to 2017-02-12
//第2周：from 2017-02-13 to 2017-02-19
//第3周：from 2017-02-20 to 2017-02-26
//第4周：from 2017-02-27 to 2017-03-05
<?php
$redis = new \redis();
$redis->connect('127.0.0.1', 6379);
$arr = array('h', 'e', 'l', 'l', 'o', 'w', 'o', 'r', 'l', 'd');
foreach ($arr as $k => $val) { //入队
    $redis->rpush('list', $val);
}
echo "队列总长度：".$redis->lLen('list');
echo "<br/>";

while (true) { //出对
    $get = $redis->lpop('list');
    if ($get) {
        echo '出队列--' . $get;
        echo '<br/>';
    } else {
        echo '出队完成';
        return false;
    }

}
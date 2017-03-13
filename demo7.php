<?php
use Workerman\Worker;
require_once __DIR__ . '/Workerman/Autoloader.php';

// 创建一个Worker监听2346端口，使用websocket协议通讯
$ws_worker = new Worker("websocket://0.0.0.0:2346");

// 启动4个进程对外提供服务
$ws_worker->count = 4;

// 当收到客户端发来的数据后返回hello $data给客户端
$ws_worker->onMessage = function($connection, $data)
{
    // 向客户端发送hello $data
    $last = get_ticker($data);
    $connection->send('现在的比特币价格是' . $last);
};

// 运行worker
Worker::runAll();

//ws = new WebSocket("ws://127.0.0.1:2346");
//ws.onopen = function() {
//    alert("连接成功");
//    ws.send('btc_cny');
//    alert("给服务端发送一个字符串：btc_cny");
//};
//ws.onmessage = function(e) {
//    alert("收到服务端的消息：" + e.data);
//};

function get_ticker($symbol){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.okcoin.cn/api/v1/ticker.do?symbol=".$symbol);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $output = curl_exec($ch);
    $ticker = json_decode($output,true);
    $last = $ticker['ticker']['last'];

    //释放curl句柄
    curl_close($ch);
    return $last;

}

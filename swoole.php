<?php
/**
 *
 * @Author: hainan
 * @Date:   2017-08-23 23:13:39
 * @Last Modified by:   hainan
 */
class livecamera
{
    /**
     * user maera
     */
    const ACTION_DRAW = 'draw';
    /**
     * user quit
     */
    const ACTION_QUIT = 'quit';
    /**
     * online user number
     */
    const ACTION_ONLINENUM = 'onlineNum';
    /**
     * listen server addr
     *
     * @var null
     */
    private $_listenAddr = null;
    /**
     * listen server port
     *
     * @var null
     */
    private $_listenPort = null;
    /**
     * swoole server object
     *
     * @var null
     */
    private $_swoole = null;
    /**
     * client set
     *
     * @var array
     */
    private $_fds = [];
    public function __construct( array $config = [] )
    {
        $this->_listenAddr = $config['addr'];
        $this->_listenPort = $config['port'];
        $swoole = new swoole_websocket_server($this->_listenAddr,$this->_listenPort);
        $swoole->on('open',[$this,'open']);
        $swoole->on('message',[$this,'receive']);
        $swoole->on('close',[$this,'close']);
        $this->_swoole = $swoole;
    }
    /**
     * connect callback
     *
     * @param  swoole_websocket_server $server  swoole_websocket_server_obj
     * @param  object                  $request user_request_object
     * @return void
     */
    public function open(swoole_websocket_server $server, $request)
    {
        print $request->fd.PHP_EOL;
        $nowfd = $request->fd;
        $this->_fds[$nowfd] = $nowfd;
        foreach ($this->_fds as $fd) {
            $this->_swoole->push($fd,json_encode(assist::formatData(self::ACTION_ONLINENUM,$nowfd,count($this->_fds))));
        }
    }
    /**
     * receive callback
     *
     * @param  swoole_websocket_server $server  swoole_websocket_server_obj
     * @param  [type]                  $frame  [description]
     * @return void
     */
    public function receive(swoole_websocket_server $server, $frame)
    {
        print 'send message is :'. $frame->data.PHP_EOL;
        $nowfd = $frame->fd;
        $fds   = $this->_fds;
        foreach ($fds as $fd) {
            if ($fd === $nowfd) continue;
            $this->_swoole->push($fd,json_encode(assist::formatData(self::ACTION_DRAW,$nowfd,$frame->data)));
        }
    }
    /**
     * close callback
     *
     * @param  swoole_websocket_server $server  swoole_websocket_server_obj
     * @param  [int]                   $quitfd  user_socket_descriptor
     * @return void
     */
    public function close(swoole_websocket_server $server, $quitfd)
    {
        print $quitfd . PHP_EOL;
        unset($this->_fds[$quitfd]);
        $fds = $this->_fds;
        foreach ($fds as  $fd) {
            $this->_swoole->push($fd,json_encode(assist::formatData(self::ACTION_QUIT,$quitfd,'')));
            $this->_swoole->push($fd,json_encode(assist::formatData(self::ACTION_ONLINENUM,$quitfd,count($this->_fds))));
        }
    }
    /**
     * websocket server start
     *
     * @return void
     */
    public function start()
    {
        $this->_swoole->start();
    }
}


$ws = new Swoole\Websocket\Server("0.0.0.0", 9508);

//监听WebSocket连接打开事件
$ws->on('open', function ($ws, $request) {

    $fd = $request->fd;
    echo "client-{$fd} is connect\n";
    //$ws->push($request->fd, "hello, welcome\n");
});

//监听WebSocket消息事件
$ws->on('message', function ($ws, $frame) {

    // $msg =  'from'.$frame->fd.":{$frame->data}\n";
    // $data   = htmlentities(htmlspecialchars($frame->data));
    // if(mb_strlen($data,'utf8')>30){
    //     $data = mb_substr($data, 0,30,'utf-8').'...';
    // }
    $data = json_decode($frame->data,true);
    //判断是否有礼物
    if($data['gift']){
        $gift = json_decode($data['gift'],true);
        $arr = array(
            'info'   => $data['info'],
            'uid'    => $data['uid'],
            'username' =>$data['username'],
            'imageSrc' =>$gift['img'],
            'number' =>$gift['number'],
        );

    }else{

        // 正常发送
        $arr = array(
            'info'   => $data['info'],
            'uid'    => $data['uid'],
            'username' =>$data['username'],
            'href'   => 'javascript:void(0);',
            'status' => 1
        );
    }

    $msg = json_encode($arr);

    foreach($ws->connections as $fd) {
        //发送信息
        $ws->push($fd, $msg);
    }


});

//监听WebSocket连接关闭事件
$ws->on('close', function ($ws, $fd) {
    echo "client-{$fd} is closed\n";
});

$ws->start();


/*发送到指定的人，必须知道指定的人的fd，可以在用户登录的时候将uid和fd做个关联存到redis或者swoole_table等其他共享内存中，通过uid找到fd进而push到这个fd上。

你看你代码中的

foreach($ws->connections as $fd) {
    //发送信息
    $ws->push($fd, $msg);
}
其中$ws->connections是获取所有的文件描述符，你如果要A直播间能看到A的评论，B能看到B的评论，你应该对fd进行分组，诸如使用redis将所有在A直播间下的fd保存到一个集合中。在A直播间下进行的评论，只取出A直播间下的fd.
举个例子，伪代码：

//当用户进入A直播间
$redis->sadd('RoomA', $fd);
给A直播间下的人发送消息

//获取所有属于A直播间下的用户的fd
$clients = $redis->smembers('RoomA');
foreach($clients as $key => $fd) {
    $ws->push($fd, $msg);
}*/




//$ws = new swoole_websocket_server("0.0.0.0", 9501);
////监听WebSocket连接打开事件
//$ws->on('open', function ($ws, $request) {
//    $fd = $request->fd;
//    echo "client-{$fd} is connect\n";
//    $ws->push($request->fd, "hello, welcome\n");
//});
////监听WebSocket消息事件
//$ws->on('message', function ($ws, $frame) {
//    echo "message: " . $frame->data . "\n";
//    $msg = $frame->data;
//    foreach($ws->connections as $fd) {
//        $ws->push($fd, $msg); //发送信息
//    }
//});
////监听WebSocket连接关闭事件
//$ws->on('close', function ($ws, $fd) {
//    echo "client-{$fd} is closed\n";
//});
//$ws->start();
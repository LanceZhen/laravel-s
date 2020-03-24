<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/23
 * Time: 11:28
 */
// 通过 go 函数创建一个协程
go(function () {
    $client = new Swoole\Coroutine\Client(SWOOLE_SOCK_TCP);
    // 尝试与指定 TCP 服务端建立连接，这里会触发 IO 事件切换协程，交出控制权让 CPU 去处理其他事情
    if ($client->connect("127.0.0.1", 9501, 0.5)) {
        // 建立连接后发送内容
        $client->send("hello world\n");
        // 打印接收到的消息（调用 recv 函数会恢复协程继续处理后续代码，比如打印消息、关闭连接）
        echo $client->recv();
        // 关闭连接
        $client->close();
    } else {
        echo "connect failed.";
    }
});

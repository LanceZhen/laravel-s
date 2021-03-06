<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/19
 * Time: 16:01
 */
$server = new Swoole\WebSocket\Server('localhost', 8000);

$server->on('open', function (Swoole\WebSocket\Server $server, $request){
    echo "server: handshake success with fd{$request->fd}\n";
});

$server->on('message', function (Swoole\WebSocket\Server $server, $frame){
    echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
    $server->push($frame->fd, "this is server");
});

$server->on('close', function($ser, $fd){
    echo "client {$fd} closed\n";
});

$server->start();

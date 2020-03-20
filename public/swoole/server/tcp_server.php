<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/19
 * Time: 11:08
 */
namespace Swoole;

$server = new Server('127.0.0.1', '9503');

$server->on('connect', function ($ser, $fd){
    echo "Client:Connect.\n";
});

$server->on('receive', function ($ser, $fd, $form_id, $data){
    $ser->send($fd, $form_id.'-Swoole:'. $data);
    $ser->close($fd);
});

$server->on('close', function (){
    echo "Client:close.\n";
});

$server->start();

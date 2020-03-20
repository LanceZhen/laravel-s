<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/19
 * Time: 11:16
 */
namespace Swoole;

go(function (){
    $client = new Coroutine\Client(SWOOLE_SOCK_TCP);

    if($client->connect('127.0.0.1', '9503', 0.5)){
        $client->send("hello world \n");
        echo $client->recv();
        $client->close();
    }else{
        echo "connect failed";
    }
});

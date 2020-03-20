<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/19
 * Time: 10:51
 */
$server = new swoole_http_server('127.0.0.1', '9501');

$server->on('start', function ($server){
    echo 'swoole http started';
});

$server->on('request', function($request, $response){
    $response->header('Content-Type', 'text/plain');
    $response->end("Hello\n");
});

$server->start();

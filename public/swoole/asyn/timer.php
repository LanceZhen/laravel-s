<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/19
 * Time: 16:50
 */
/*\Swoole\Timer::tick(1000, function (){
    echo "Swoole 很棒\n";
});*/

/*$timerId = \Swoole\Timer::after(1000, function (){
    echo "Laravel 也很棒\n";
});*/
//\Swoole\Timer::clear($timerId);

$count = 0;
\Swoole\Timer::tick(1000, function ($timerId, $count) {
    global $count;
    echo "Swoole 很棒\n";
    $count++;
    if ($count == 3) {
        \Swoole\Timer::clear($timerId);
    }
}, $count);

<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('/cpu', function () use ($router) {
    $pi = 4; $top = 4; $bot = 3; $minus = TRUE;
    $accuracy = 20000000;

    $start = microtime(true);
    for($i = 0; $i < $accuracy; $i++)
    {
      $pi += ( $minus ? -($top/$bot) : ($top/$bot) );
      $minus = ( $minus ? FALSE : TRUE);
      $bot += 2;
    }
    $end = microtime(true);
    $time1 = (($end-$start)*1000) . 'ms';


    $start = microtime(true);
    $bottom = 1;
    $pi2 = 0;
    for ($i = 1; $i < $accuracy; $i++) {
        if ($i % 2 == 1) {
            $pi2 += 4 / $bottom;
        } else {
            $pi2 -= 4 / $bottom;
        }
        $bottom += 2;
    }
    $end = microtime(true);
    $time2 = (($end-$start)*1000) . 'ms';
    return array(
        'pi-01'=> $pi,
        'pi-02'=> $pi2,
        'loop'=>$accuracy,
        'pi-01-duration'=>$time1,
        'pi-02-duration'=> $time2
    );
});


$router->get('/mem', function () use ($router) {
    $accuracy = 100000;
    $container = array();
    $start = microtime(true);
    for ($i = 0; $i < $accuracy; $i++) {
        array_push($container, 'abcd' . microtime() ."-" . rand(), 'xyz' . microtime() ."-" . rand());
    }
    $end = microtime(true);  
    return array(
        'loop'=>$accuracy,
        'len'=> count($container),
        'duration' => (($end-$start)*1000) . 'ms'
    );

});
<?php

// 获得API实例
$api = app('Dingo\Api\Routing\Router');

// 定义版本组
$api->version('v1', function ($api) {
    $api->get('test', [\App\Http\Controllers\TestController::class, 'index']); // 简单创建端点，也就是接口

    // 命名路由
    $api->get('name', ['as' => 'test.name', 'uses' => '\App\Http\Controllers\TestController@name']);

    // 执行登录
    $api->post('login', [\App\Http\Controllers\TestController::class, 'login']);

    // 需要登录的路由
//    $api->group(['middleware' => 'api.auth'], function($api) {
//        $api->get('users', [\App\Http\Controllers\TestController::class, 'users']);
//    });
    $api->group(['middleware' => 'api.auth'], function ($api) {
        $api->get('users', [\App\Http\Controllers\TestController::class, 'users']);
    });

});



$api->version('v2', function ($api) {

});

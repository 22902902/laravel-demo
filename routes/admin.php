<?php

// 后台API

// 获得API实例
$api = app('Dingo\Api\Routing\Router');

// 定义版本组 1分钟请求3次
$params = [
    'middleware' => [
        'api.throttle',
        'serializer:array', // 减少transformer包裹层
        'bindings'// 支持路由模型注入
    ],
    'limit' => 60,
    'expires' => 1
];

$api->version('v1' , $params , function ($api) {

    $api->group(['prefix' => 'adminapi'], function ($api) {
        // 需要登录的路由
        $api->group(['middleware' => 'api.auth'], function ($api) {
            /**
             * 用户管理
             */
            // 禁用用户 、 启用用户
            $api->patch('users/{user}/lock', [\App\Http\Controllers\AdminApi\UserController::class, 'lock']);
            // 用户管理资源路由
            $api->resource('users',\App\Http\Controllers\AdminApi\UserController::class,[
                'only' => ['index','show'], // 启用的资源，只能用index和show
            ]);

            /**
             * 分类管理
             */
            // 分类管理资源路由
            $api->resource('category',\App\Http\Controllers\AdminApi\CategoryController::class,[
                'except' => ['destroy'], // 禁用的资源，除了destroy都能用
            ]);
        });
    });

});





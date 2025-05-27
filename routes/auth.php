<?php
// 用户认证

// 获得API实例
$api = app('Dingo\Api\Routing\Router');

// 定义版本组 1分钟请求3次
$api->version('v1' , ['middleware' => 'api.throttle', 'limit' => 60, 'expires' => 1] , function ($api) {

    // 路由组
    $api->group(['prefix' => 'auth'], function ($api) {

        // 测试一个路由: http://localhost:8013/api/auth/register
//        $api->post('register', function () {
//            return [1];
//        });

        // 用户注册
        $api->post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'store']);

        // 登录
        $api->post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);

        // 需要登录的路由
        $api->group(['middleware' => 'jwt.auth'], function ($api) {
            // 退出登录
            $api->post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);
            // 刷新token
            $api->post('refresh', [\App\Http\Controllers\Auth\LoginController::class, 'refresh']);
        });
    });



});





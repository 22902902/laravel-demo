<?php
// 用户认证

// 获得API实例
$api = app('Dingo\Api\Routing\Router');

// 定义版本组 1分钟请求3次
$api->version('v1' , ['middleware' => 'api.throttle', 'limit' => 60, 'expires' => 1] , function ($api) {

    $api->group(['middleware' => 'api.auth'], function ($api) {

    });

});





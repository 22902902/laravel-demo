<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CateController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
 * 门面测试路由
 */
Route::get('facades/test', function (){
    // 实时 Facades
    Facades\App\Facades\ShowEmail::show();

    // 直接实例
    \App\Facades\ShowTel::show();

    // 别名
    \App\Facades\ShowWebSite::show();
});

/**
// 用户添加路由
Route::get('user/add', [UserController::class,'add']);
// 用户执行添加路由
Route::post('user/addstore', [UserController::class,'addstore']);

// 用户列表页路由
Route::get('user/index', [UserController::class,'index']);

// 用户修改路由
Route::get('user/edit/{id}', [UserController::class,'edit']);

// 用户修改提交
Route::post('user/update', [UserController::class,'update']);

// 用户删除路由
Route::get('user/del/{id}', [UserController::class,'destroy']);
*/


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'],function (){
    // 用户登录
    Route::get('login', [LoginController::class,'login']);

    // 用户登录处理
    Route::post('doLogin', [LoginController::class,'doLogin']);
});


// 生成验证码图片
Route::get('captcha/{config?}', [\Mews\Captcha\CaptchaController::class,'getCaptcha'])->middleware('web');

Route::get('noaccess',[LoginController::class,'noaccess']);

// Route::group 路由组，prefix：前缀，namespace: 命名空间， middleware: 中间件 ,起名字 islogin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['hasRole','isLogin']],function (){
    // 首页
    Route::get('index', [LoginController::class,'index']);

    // 后台欢迎页
    Route::get('welcome', [LoginController::class,'welcome']);

    // 后台退出登录
    Route::get('logout', [LoginController::class,'logout']);

    // 用户模块相关路由 -- 资源路由
    Route::get('user/del', [UserController::class,'delAll']); //\App\Http\Controllers\Admin\UserController@delAll
    Route::resource('user','\App\Http\Controllers\Admin\UserController');
    // 用户模块给角色
    Route::get('user/auth/{id}', [UserController::class,'auth']);
    // 处理授权
    Route::post('user/doAuth', [UserController::class,'doAuth']);

    // 角色模块
    Route::resource('role','\App\Http\Controllers\Admin\RoleController');
    // 角色授权路由
    Route::get('role/auth/{id}', [RoleController::class,'auth']);
    // 处理授权
    Route::post('role/doAuth', [RoleController::class,'doAuth']);

    // 权限模块路由
    Route::resource('permission', '\App\Http\Controllers\Admin\PermissionController');


    // 分类路由
    Route::resource('cate','\App\Http\Controllers\Admin\CateController');
    // 修改排序ajax
    Route::post('cate/changeorder',[CateController::class,'changeOrder']);

    // 文章
    Route::resource('article','\App\Http\Controllers\Admin\ArticleController');
    // 上传路由
    Route::post('article/upload', [ArticleController::class,'upload']);
    // 将markdown语法转化为html语法的内容
    Route::post('article/per_mk', [ArticleController::class,'per_mk']);


    // 网站配置模块路由
    Route::resource('config','\App\Http\Controllers\Admin\ConfigController');
    Route::post('config/changecontent', [ConfigController::class,'changecontent']);
    Route::get('config/putcontent', [ConfigController::class,'putcontent']);

});



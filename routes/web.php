<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\UserController;
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

// 用户登录
Route::get('admin/login', [LoginController::class,'login']);

// 生成验证码图片
Route::get('captcha/{config?}', [\Mews\Captcha\CaptchaController::class,'getCaptcha'])->middleware('web');

// 用户登录处理
Route::post('admin/doLogin', [LoginController::class,'doLogin']);

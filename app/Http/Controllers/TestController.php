<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    // 测试 http://localhost:8013/api/test
    public function index() {
        //return response()->json(['status' => 'success']);

        // dingo 响应
        // 返回数据集合
        //return User::all();

        // 返回单个数据
        //return User::find(1);

        //return User::findOrFail(1);

        // 使用响应生成器响应一个数组
        // return $this->response->array(['username' => 'admin','password' =>'123456']);

        // 无内容响应
        return $this->response->noContent();
    }

    // http://localhost:8013/api/name
    public function name() {
        $url = app('Dingo\Api\Routing\UrlGenerator')->version('v1')->route('test.name');
        dd($url);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    // 测试
    public function index() {
        return response()->json(['status' => 'success']);
    }

    // http://localhost:8013/api/name
    public function name() {
        $url = app('Dingo\Api\Routing\UrlGenerator')->version('v1')->route('test.name');
        dd($url);
    }
}

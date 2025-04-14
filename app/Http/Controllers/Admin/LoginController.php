<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * 登录
 * Class LoginController
 * @package App\Http\Controllers\Admin
 */
class LoginController extends Controller
{

    public function login() {
        return view('admin.login');
    }

    // 处理用户登录到方法
    public function doLogin(Request $request) {
        // 1. 接收表单提交的数据
        //$input = $request->except('_token');
        //dd($input);

        // 2.进行表单验证
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'password' => '用户名或密码错误',
        ])->withInput($request->except('password'));
    }
}

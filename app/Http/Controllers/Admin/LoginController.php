<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use MongoDB\Driver\Session;

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

        //dd(session()->get('captcha'));

        // 1. 接收表单提交的数据
        $input = $request->except('_token');
        //dd($input);

        // 2.进行表单验证
        // 使用 Laravel 内置的 required 规则（推荐）
//        $credentials = $request->only('username', 'password');
//
//        if (Auth::attempt($credentials, $request->filled('remember'))) {
//            $request->session()->regenerate();
//            return redirect()->intended('/dashboard');
//        }
//
//        return back()->withErrors([
//            'password' => '用户名或密码错误',
//        ])->withInput($request->except('password'));

        // 验证规则
        $rule = [
            'username' => 'required|between:4,18',
            'password' => 'required|between:4,8|alpha_dash',
            'captcha' => 'required|captcha', //captcha规则用于验证验证码是否正确
        ];

        // 错误提示信息
        $msg = [
            'username.required' => '请输入用户名',
            'username.between' => '用户名长度必须在4-18位之间',
            'password.required' => '请输入密码',
            'password.between' => '密码长度必须在4-18位之间',
            'password.alpha_dash' => '密码必须是字母数字下划线',
            'captcha.required' => '验证码不能为空',
            'captcha.captcha' => '验证码错误',
        ];

        // $validator = Validator::make('需要验证的表单数据'， '验证规则', '错误提示信息');
        $validator = Validator::make($input, $rule, $msg);

        if($validator->fails()) {
            return redirect('admin/login')
                ->withErrors($validator)
                ->withInput();
        }

        // 3.验证是否由此用户（用户名，密码，验证码）

        // 首先验证，验证码
        //dd(session()->get('captcha'));
//        if($input['captcha'] !== Session::get('captcha.key')) {
//            return back()->withErrors(['captcha' => '验证码错误']);
//        }

        $user = User::where('username',$input['username'])->first();
        //dd($user);
        if(!$user) {
            return redirect('admin/login')->withErrors([
                'username' => '用户名不能为空'
            ]);
        }

        // 加密算法
        // 1.md5加密，生成一个32位的字符串  md5($str); 一般一个盐值+密码
        // 2.哈希加密 65位，加密：$hash = Hash::make($str);  解密：Hash::check($str, $hash); check判断用
        // 3.crypt加密 255位 加密：$crypt_str = Crypt::encrypt($str); 解密：Crypt::decrypt($crypt_str) == $str
        if (!Hash::check($input['password'], $user->password)) {
            return redirect('admin/login')->withErrors([
                'password' => '密码错误'
            ]);
        }

        // 4.保存用户信息到session中
        session()->put('user', $user);
        // 5.跳转到后台首页
        return redirect('admin/index');

    }

    // 后台首页
    public function index() {
        return view('admin/index');
    }

    // 后台欢迎页
    public function welcome() {
        return view('admin/welcome');
    }

    // 退出登录
    public function logout() {
        // 清空session中的用户信息
        session()->flush();
        // 跳转到登录页面
        return redirect('admin/login');
    }
}

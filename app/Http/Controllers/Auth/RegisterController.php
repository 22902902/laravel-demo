<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseControllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * 注册
 *
 * php artisan make:controller Auth/RegisterController
 *
 * Class RegisterController
 * @package App\Http\Controllers\Auth
 */
class RegisterController extends BaseControllers
{
    /**
     * 用户注册
     */
    public function store(RegisterRequest $request) // RegisterRequest 我自己写的表单验证
    {
        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->name = $request->input('name');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return $this->response->created();
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * 登录表单验证
 * Class LoginRequest
 * @package App\Http\Requests
 */
class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // 设置为true允许所有用户提交
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|string|min:3|max:20', // required 必须输入， between:4,18 长度4-18之间
            'password' => 'required|string|min:8',
            'captcha'  => 'required|captcha' // 验证码规则
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '用户名不能为空',
            'username.min'      => '用户名至少3个字符',
            'password.required' => '密码不能为空',
            'password.min'      => '密码长度至少8位',
            'captcha.required' => '验证码不能为空',
            'captcha.captcha'  => '验证码不正确'
        ];
    }

    public function attributes()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
            'captcha'  => '验证码'
        ];
    }
}

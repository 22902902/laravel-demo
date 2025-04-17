<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // 必须返回 true 才能进行验证
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|string|min:3|max:20|unique:users',
            'name'     => 'required|string|max:50',
            'email'    => 'required|email|max:100|unique:users',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '用户名必须填写',
            'username.min'       => '用户名不能少于3个字符',
            'username.max'      => '用户名不能超过20个字符',
            'username.unique'    => '该用户名已被使用',
            'name.required'     => '姓名不能为空',
            'email.required'    => '邮箱必须填写',
            'email.email'       => '邮箱格式不正确',
            'email.unique'      => '该邮箱已被注册',
            'password.required' => '密码必须填写',
            'password.min'      => '密码至少需要8个字符',
            'password.confirmed'=> '两次输入的密码不一致'
        ];
    }

    public function attributes()
    {
        return [
            'username' => '用户名',
            'name'     => '姓名',
            'email'    => '邮箱',
            'password' => '密码'
        ];
    }
}

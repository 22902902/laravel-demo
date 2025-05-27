<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;

/**
 * 注册接口表单验证
 *
 * php artisan make:request Auth/RegisterRequest
 *
 * Class RegisterRequest
 * @package App\Http\Requests\Auth
 */
class RegisterRequest extends BaseRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // 验证规则
        return [
            'username' => 'required|min:2|max:16',
            'name' => 'required|min:2|max:16', // 必填、最少2个字符、最多不能超过16个字符
            'email' => 'required|email|unique:users', // 必填、email格式认证、邮箱再users表唯一验证
            'password' => 'required|min:6|max:16|confirmed', // 必填、最少6个字符、最多不能超过16个字符、确认密码验证
        ];
    }

    /**
     * 自定义验证消息
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '昵称不能为空',
            'name.max' => '昵称不能超过16个字符'
        ];
    }
}

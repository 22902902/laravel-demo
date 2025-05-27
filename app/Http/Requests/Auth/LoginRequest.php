<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

/**
 * 登录验证
 * php artisan make:request Auth/LoginRequest
 * Class LoginRequest
 * @package App\Http\Requests\Auth
 */
class LoginRequest extends BaseRequest
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
            'password' => 'required|min:4|max:16', // 必填、最少4个字符、最多不能超过16个字符
        ];
    }
}

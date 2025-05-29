<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseControllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;


/**
 *
 * 登录
 * php artisan make:controller Auth/LoginController
 *
 *
 * Class LoginController
 * @package App\Http\Controllers\Auth
 */
class LoginController extends BaseControllers
{
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {

        $credentials = request(['username', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return $this->response->errorUnauthorized();
        }

        // 检查用户状态 0禁用 1启用
        $user = auth('api')->user();
        if($user->status == 0) {
            return $this->response->errorForbidden('被锁定');
        }

        return $this->respondWithToken($token);
    }



    /**
     *
     * 退出登录
     *
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        // return 一个测试数据
        //return [1];

        auth('api')->logout();

        return $this->response->noContent();
    }

    /**
     * 刷新token
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * 格式化返回token
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return $this->response->array([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}

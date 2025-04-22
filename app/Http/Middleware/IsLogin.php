<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * 登录中间件
 * Class IsLogin
 * @package App\Http\Middleware
 */
class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // 登录逻辑
        if(session()->get('user')) {
            return $next($request); // 用户登录
        } else {
            return redirect('admin/login')->withErrors([
                'errors' =>  '请注意一下素质'
            ]);
        }

    }
}

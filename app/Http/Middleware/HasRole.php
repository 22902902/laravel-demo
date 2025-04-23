<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;

/**
 * 权限中间件
 * Class HasRole
 * @package App\Http\Middleware
 */
class HasRole
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
        // 1.获取当前请求的路由，对应的控制器的方法名
        $route = \Route::current()->getActionName();
        //dd($route);
        // 2.获取当前用户的权限组
        // 用户 找到 角色， 从角色 找到 权限
        $user = User::find(session()->get('user')->id);
        //dd($user);
        // 获取当前用户的角色
        $roles = $user->role;
        //dd($roles);
        // 根据用户拥有的角色，找对应的权限
        $arr = []; //存放权限对应的路由地址route,也就是权限列表
        foreach ($roles as $item) {
            //$arr[] =  $item->permission->route;
            $perms = $item->permission;
            foreach ($perms as $perm) {
                $arr[] = $perm->route;
            }
        }
        // 去掉重复的权限
        $arr = array_unique($arr);
        // 判断当前请求的路由对应控制器的方法名是否在当前用户拥有的权限列表中也就是$arr中
        // 权限控制先关了，后续优化
//        if(in_array($route,$arr)) {
//            return $next($request);
//        } else {
//            return redirect('noaccess');
//        }

        //dd($arr);
        return $next($request); // 权限需要优化 admin的权限应该是*
    }
}

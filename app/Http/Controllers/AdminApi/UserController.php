<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\BaseControllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;

/**
 *
 * php artisan make:controller AdminApi/UserController --api
 *
 * Class UserController
 * @package App\Http\Controllers\AdminApi
 */
class UserController extends BaseControllers
{
    /**
     * 用户列表
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 搜索
        $name = $request->input('name');
        $email = $request->input('email');
        // 普通查询
//        $users = User::all();
//        return $this->response->collection($users, new UserTransformer());

        // 分页
        $users = User::when($name, function ($query) use ($name) { // 搜索条件name在的时候，query查询构造器, 闭包传参name ： use ($name)
                $query->where('name', 'like', "%$name%"); // 模糊查询
            })
            ->when($email, function ($query) use ($email) { // 闭包
                $query->where('email', $email); // 完全匹配查询
            })
            ->paginate(2);
        return $this->response->paginator($users, new UserTransformer());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     *
     * 用户详情
     *
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //return $user;
        return $this->response->item($user, new UserTransformer());

    }

    /**
     * 禁用和启用
     */
    public function lock(User $user)
    {
        $user->status = $user->status == 0 ? 1 : 0;
        $user->save();
        return $this->response->noContent();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

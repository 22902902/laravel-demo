<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{


    /**
     * 获取一个添加方法
     * @param null
     * @return 返回添加页面
     */
    public function add() {

        return view('user.add');
    }

    /**
     * 执行用户添加操作
     * @param 提交的表单数据
     * @return 返回添加是否成功
     */
    public function addstore(Request $request) {
        // 1.获取客户端提交的表单数据
        //$input = $request->all();
        // 过滤token
        $input = $request->except('_token');
        //$input['passwordMd5'] = md5($input['password']);
        $input['password'] = bcrypt($input['password']); // laravel 自己的加密
        //dd($input);
        // 2.表单验证

        // 3.添加操作
        $res = User::create($input);

        // 4.如果添加成功，跳转到列表页，如果添加失败，跳转回原页面
        if($res) {
            return redirect('user/index');
        } else {
            return back();
        }

        dd($res);
    }

    /**
     * 用户列表页
     * @param null
     * @return 返回添加页面
     */
    public function index() {
        // 获取用户数据
        $user = User::get();
        // 返回用户列表
        //return view('user.list',['user' => $user]);
        //return view('user.list')->with('user',$user);
        return view('user.list',compact('user'));
    }

    /**
     * 修改页面
     * @param null
     * @return 返回添加页面
     */
    public function edit($id) {
        // 1.根据要修改的记录的id，找到修改用户
        $user = User::find($id);

        // 2.返回用户修改页面
        return view('user.edit', compact('user'));
    }

    /**
     * 修改确认页面
     * @param null
     * @return 返回添加页面
     */
    public function update(Request $request) {
        // 1.接收用户名和用户id
        $input = $request->all();
        //dd($input);

        $user = User::find($input['id']);
        // 将提交过来的用户名替换掉原来记录的用户名
        $res = $user->update([
            'name' => $input['name'],
            'username' => $input['username'],
            'email' => $input['email'],
        ]);

        // 3.根据修改是否成功，跳转到对应页面
        if($res) {
            return redirect('user/index');
        } else {
            return back();
        }
    }

    // 用户删除
    public function destroy($id) {
        $user = User::find($id);
        $res = $user->delete();
        if($res) {
            $data = [
                'status' => 0,
                'message' => '删除成功'
            ];
        } else {
            $data = [
                'status' => 1,
                'message' => '删除失败'
            ];
        }

        return $data;
    }
}

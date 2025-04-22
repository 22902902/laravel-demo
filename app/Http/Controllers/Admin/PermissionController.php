<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 1.获取所有的角色数据
        $permission = Permission::get();

        // 2.返回视图return view('admin.permission.list', compact('permission'));
        return view('admin.permission.list', compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1.获取表单提交数据
        $input = $request->except('_token');
        //dd($input);
        // 2.进行表单验证

        // 3.将数据添加到role表中
        $res = Permission::create($input);
        if($res) {
            return redirect('admin/permission');
        } else {
            return back()->withErrors([
                'msg' => '添加失败',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.permission.edit',compact('permission'));
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
        // 1.根据ID获取要修改的记录
        $permission = Permission::find($id);
        //dd($permission);
        // 2.获取要修改成的用户名
        if($permission->name !== $request->input('name')) {
            $permission->name = $request->input('name');
        }

        if($permission->display_name !== $request->input('display_name')) {
            $permission->display_name = $request->input('display_name');
        }

        if($permission->route !== $request->input('route')) {
            $permission->route = $request->input('route');
        }

        $res = $permission->save();

        return $this->msg($res, "修改");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 1.获取用户
        $user = Permission::find($id);
        $res = $user->delete();
//        if($res) {
//            $data = [
//                'status' => 0,
//                'message' => '删除成功'
//            ];
//        } else {
//            $data = [
//                'status' => 1,
//                'message' => '删除失败'
//            ];
//        }
//        return $data;
        return $this->msg($res, "删除");
    }

    /**
     * 提示信息
     * @param $res
     * @param $msg
     */
    private function msg($res, $msg) {
        if($res) {
            $data = [
                'status' => 0,
                'message' => $msg .'成功'
            ];
        } else {
            $data = [
                'status' => 1,
                'message' => $msg .'失败'
            ];
        }
        return $data;
    }
}

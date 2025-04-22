<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    /**
     *
     * 获取授权页面
     */
    public function  auth($id) {

        // 通过ID获取当前角色
        $role = Role::find($id);
        // 获取所有的权限列表
        $perms = Permission::get();

        // 获取当前角色拥有的权限
        $own_perms = $role->permission;
        //dd($own_perms);
        // 角色拥有的权限的ID
        $own_pers = [];
        foreach ($own_perms as $item) {
            $own_pers[] = $item->id;
        }
        //dd($own_perms);

        return view('admin.role.auth',compact('role', 'perms', 'own_pers'));
    }

    /**
     * 处理授权
     */
    public function doAuth(Request $request) {
        $input = $request->except('_token');
        //dd($input);

        // 先删除当前角色已有的权限
        \DB::table('permission_role')->where('role_id',$input['role_id'])->delete();

        if(!empty($input['permission_id'])) {
            // 添加新授予的权限
            foreach ($input['permission_id'] as $item) {
                \DB::table('permission_role')->insert(['role_id'=>$input['role_id'], 'permission_id' => $item]);
            }
        }

        return redirect('admin/role');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 1.获取所有的角色数据
        $role = Role::get();

        // 2.返回视图
        return view('admin.role.list', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // 1.获取表单提交数据
        $input = $request->except('_token');
        //dd($input);
        // 2.进行表单验证

        // 3.将数据添加到role表中
        $res = Role::create($input);
        if($res) {
            return redirect('admin/role');
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
        //
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

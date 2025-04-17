<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * 获取用户列表页
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 1.获取提交的请求参数
        //$input = $request->all();
//        dd($input);
        $user = User::orderBy('id', 'asc')
            ->where(function($query) use ($request){
                $username = $request->input('username');
                $email = $request->input('email');
                if(!empty($username)){
                    $query->where('username','like', '%'. $username .'%');
                }
                if(!empty($email)){
                    $query->where('email','like', '%'. $email .'%');
                }
            })
            ->paginate($request->input('num')?$request->input('num'):3);
        //$user = User::paginate(3); // laravel 自带分页，参数是条数
        return view('admin.user.list',compact('user','request'));
    }

    /**
     * 返回用户添加页面
     *
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * 用户添加操作
     *
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        // 测试ajax
        // return 11111;
        // 1.接收前台表单提交的数据
        //$input = $request->all();
        $validated = $request->validated();

        // 2.进行表单验证

        // 3.添加到数据库的user表
        $res = User::create([
            'username' => $validated['username'],
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        // 4.根据添加是否成功，给客户端返回一个json格式的反馈
        if($res) {
            $data = [
                'status' => 0,
                'message' => '添加成功',
            ];
        } else {
            $data = [
                'status' => 1,
                'message' => '添加失败',
            ];
        }
        return $data;
    }

    /**
     * 显示一条用户数据记录
     *
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
     * 返回用户修改页面
     *
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
     * 执行修改操作
     *
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
     * 执行删除操作
     *
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use Illuminate\Http\Request;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取分类数据
        //$cate = Cate::get();
        // 调用模型的tree方法
        //$categories = (new Cate())->tree(); // 有bug

        // 获取所有顶级分类并预加载子分类关系
        // with('children') 使用递归预加载减少查询次数
//        $categories = Cate::with('children')
//            ->whereIsRoot()
//            ->orderBy('_lft')
//            ->get();
//
//        // 用于分类表单中的父级选择（排除自身）
//        $parentOptions = Cate::get()->toFlatTree();

        // 获取所有分类（按嵌套顺序排列）
        $categories = Cate::withDepth()
            //->orderBy('_lft')
            ->orderBy('order','asc')
            ->get();

        // 返回分类页面
        //return view('admin.cate.list',compact('categories', 'parentOptions'));
        return view('admin.cate.list',compact('categories'));
    }

    /**
     * 修改排序
     */
    public function changeOrder(Request $request) {
        // 1.获取传过来的参数
        $input = $request->except('_token');


        // 2.通过分类ID获取当前分类
        $cate = Cate::find($input['id']);

        // 3.修改当前分类的排序值
        $res = $cate->update(['order'=>$input['order']]);
        return msg($res, "修改");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 获取一级类
        //$cate = Cate::where('parent_id', null)->get();
        $cate = Cate::whereIsRoot()->get(); // kalnoy/nestedset 用法
        return view('admin.cate.add',compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1.接收添加的分类数据
        $input = $request->except('_token');

        // 2.表单验证

        // 3.添加到数据库中
        $res = Cate::create($input);

        // 4.判断是否添加成功
        if($res) {
            return redirect('admin/cate');
        } else {
            return back();
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

<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\BaseControllers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


/**
 *
 * 分类
 * php artisan make:controller AdminApi/CategoryController --api
 *
 * Class CategoryController
 * @package App\Http\Controllers\AdminApi
 *
 */
class CategoryController extends BaseControllers
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * 添加分类， 最大三级分类
     */
    public function store(Request $request)
    {
        // 表单验证
        $request->validate([
            'name' => 'required|max:16'
        ], [
            'name.required' => '分类名称不能为空',
        ]);

//        Category::create(
//            $request->only([
//                'name', 'pid'
//            ])
//        );

        $pid = $request->input('pid', 0);
        $level = $pid == 0 ? 1 : (Category::find($pid)->level + 1);

        if($level > 3) return $this->response->errorBadRequest('不能超过3级分类');

        $insertData = [
            'name' => $request->input('name'),
            'pid' => $pid,
            'level' => $level, // 分类等级
        ];

        Category::create($insertData);


        return $this->response->created();
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

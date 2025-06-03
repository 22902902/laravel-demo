<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\BaseControllers;
use App\Http\Controllers\Controller;
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
     * 添加分类
     */
    public function store(Request $request)
    {
        // 表单验证
        $request->validate([
            'name' => 'required|max:16'
        ]);
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

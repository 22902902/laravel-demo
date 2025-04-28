<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    /**
     * 文件上传
     */
    public function upload(Request $request) {
        // 获取上传文件
        $file = $request->file('photo');

        // 判断上传文件是否成功
        if(!$file->isValid()) {
            return response()->json([
                'ServerNo' => '400',
                'ResultData' => '无效的上传文件'
            ]);
        }

        // 如果是有效的文件，获取源文件的扩展名
        $ext = $file->getClientOriginalExtension(); // 文件扩展名

        // 生成新文件名，不能写死
        $newFile = md5(time().rand(1000,9999)) . '.' . $ext;

        // 文件上传的指定路径
        $path = public_path('uploads');

        // 将文件从临时目录移动到指定目录
        if(!$file->move($path, $newFile)) {
            return response()->json([
                'ServerNo' => '401',
                'ResultData' => '保存文件失败'
            ]);
        }
        // 如果上传成功
        return response()->json([
            'ServerNo' => '200',
            'ResultData' => $newFile
        ]);



    }

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$cate = Cate::whereIsRoot()->get(); // kalnoy/nestedset 用法
        $cate = Cate::withDepth()
            ->orderBy('_lft')
            //->orderBy('order','asc')
            ->get();
        return view('admin.article.add',compact('cate'));
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

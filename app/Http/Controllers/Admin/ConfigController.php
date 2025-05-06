<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfigController extends Controller
{
    /**
     * 批量修改网站配置项
     * changecontent
     */
    public function changecontent(Request $request) {
        // 接收传过来的参数
        $input = $request->except('_token');
        //dd($input);
        // 事务
        // 开启事务
        DB::beginTransaction();

        try{
            foreach($input['conf_id'] as $k => $v) {
                DB::table('config')
                    ->where('conf_id', $v)
                    ->update([
                        'content'=> $input['content'][$k]
                    ]);
            }

            // 执行成功,提交
            DB::commit();
            return redirect('/admin/config');
        }catch (\Exception $exception) {
            // 捕获异常, 回滚
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]); // 重定向
        }


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取所有网站配置项
        $conf = Config::get();

        // 格式化返回数据
        foreach($conf as $item) {
            // 类型
            switch ($item->field_type) {
                // 1.文本框 input
                case 'input':
                    $item->conf_contents = '<input value="' . $item->content .'" type="text" name="content[]" class="layui-input">';
                    break;
                // 2.文本域 textarea
                case 'textarea':
                    $item->conf_contents = '<textarea name="content[]" class="layui-textarea">' . $item->content . '</textarea>';
                    break;
                // 3.单选按钮 radio
                case 'radio':
                    /**
                     *  1|开启,0|关闭 => [0 => '1|开启', 1=>'0|关闭']
                     */
                    // 定义一个字符串，存放最新的结果
                    $str = '';
                    $arr = explode(',',$item->field_value);
                    foreach ($arr as $v) {
                        $a = explode('|', $v);

                        // 如果
                        if($a[0] == $item->content) {
                            $str .= '<input type="radio" checked name="content[]" value="' . $a[0] . '" title="' . $a[1] . '">' . $a[1] . '&nbsp;&nbsp;&nbsp;&nbsp;';
                        } else {
                            $str .= '<input type="radio" name="content[]" value="' . $a[0] . '" title="' . $a[1] . '">' . $a[1] . '&nbsp;&nbsp;&nbsp;&nbsp;';
                        }

                    }

                    $item->conf_contents = $str;
                    break;
            }
        }

        return view('admin.config.list', compact('conf'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 返回添加页面
        return view('admin.config.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 接收传过来的参数
        $input = $request->except('_token');
        // 1|开启,0|关闭
        // 找到 field_type,单选按钮单独配置
        if($input['field_type'] == "radio") {
            $input['field_value'] = "1|开启,0|关闭";
        }
        //dd($input);

        $res = Config::create($input);

        // 提示跳转
        resUrl($res, 'admin/config');
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

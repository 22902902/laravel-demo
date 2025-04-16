<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>后台登录-X-admin2.0</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <!-- 引入 css js -->
    @include('admin.public.styles')
    @include('admin.public.script')


</head>

<body>
<!-- 中部开始 -->
<!-- 左侧菜单开始 -->
@include('admin.public.aside')
<!-- <div class="x-slide_left"></div> -->
<!-- 左侧菜单结束 -->
<!-- 右侧主体开始 -->
<div class="page-content">
    @include('admin.public.header')
    <div class="slide_bar"></div>
    <div class="layui-tab tab tool" lay-filter="xbs_tab" lay-allowclose="false">
        <div class="container bar">
            <div class="left_open">
                <i title="展开左侧栏" class="iconfont">&#xe699;</i>
            </div>
        </div>
        <ul class="layui-tab-title">
            <li class="home">首页</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src='{{ url('admin/welcome') }}' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="page-content-bg"></div>
<!-- 右侧主体结束 -->
<!-- 中部结束 -->
@include('admin.public.footer')
</body>

</html>

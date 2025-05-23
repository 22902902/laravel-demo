<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台登录-X-admin2.0</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('./css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/xadmin.css') }}">
    <script type="text/javascript" src="{{ asset('./js/layer/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('./lib/layui/layui.js') }}" charset="utf-8"></script>
    <script type="text/javascript" src="{{ asset('./js/xadmin.js') }}"></script>

</head>
<body class="login-bg">

<div class="login layui-anim layui-anim-up">
    <div class="message">x-admin2.0-管理登录</div>
    <div id="darkbannerwrap"></div>

    <form method="post"  action="{{ url('admin/doLogin') }}" ><!-- class="layui-form" -->
        <!-- post直接提交会报错419，需要加个token -->
        {{ csrf_field() }}
        <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
        @error('username')
        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
        @enderror
        <hr class="hr15">
        <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
        @error('password')
        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
        @enderror
        <hr class="hr15">
        <!-- 验证码 -->
        <input name="captcha" style="height:40px; width: 150px;float:left;" lay-verify="required" placeholder="验证码"  type="text" class="layui-input">
        <!-- 正确写法（使用 captcha_src() 生成验证码URL） -->
        <img src="{{ captcha_src('flat') }}" onclick="this.src='{{ captcha_src('flat') }}?t='+Date.now()" style="float:right;" title="点击刷新验证码" >
        @error('captcha')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <hr class="hr15">
        <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
        <hr class="hr20" >
    </form>
</div>

<script>
    // $(function  () {
    //     layui.use('form', function(){
    //         var form = layui.form;
    //         // layer.msg('玩命卖萌中', function(){
    //         //   //关闭后的操作
    //         //   });
    //         //监听提交
    //         form.on('submit(login)', function(data){
    //             // alert(888)
    //             layer.msg(JSON.stringify(data.field),function(){
    //                 location.href='login'
    //             });
    //             return false;
    //         });
    //     });
    // })


</script>


<!-- 底部结束 -->
<script>
    //百度统计可去掉
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>

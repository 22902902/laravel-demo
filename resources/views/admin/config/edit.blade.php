<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <!-- 引入 css js -->
    @include('admin.public.styles')
    @include('admin.public.script')
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="x-body">
    <form class="layui-form">
        <div class="layui-form-item">
            <label for="L_email" class="layui-form-label">
                <span class="x-red">*</span>邮箱
            </label>
            <div class="layui-input-inline">
                <input type="hidden" name="uid" value="{{ $user->id }}">
                <input type="text" id="L_email" name="email" required="" lay-verify="email"
                       autocomplete="off" class="layui-input" value="{{ $user->email }}">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>将会成为您唯一的登入名
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                <span class="x-red">*</span>用户名
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_username" name="username" required="" lay-verify="nikename"
                       autocomplete="off" class="layui-input" value="{{ $user->username }}" >
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_username" class="layui-form-label">
                昵称
            </label>
            <div class="layui-input-inline">
                <input type="text"  name="name" required="" lay-verify="nikename"
                       autocomplete="off" class="layui-input" value="{{ $user->name }}" >
            </div>
        </div>
{{--        <div class="layui-form-item">--}}
{{--            <label for="L_pass" class="layui-form-label">--}}
{{--                <span class="x-red">*</span>密码--}}
{{--            </label>--}}
{{--            <div class="layui-input-inline">--}}
{{--                <input type="password" id="L_pass" name="pass" required="" lay-verify="pass"--}}
{{--                       autocomplete="off" class="layui-input">--}}
{{--            </div>--}}
{{--            <div class="layui-form-mid layui-word-aux">--}}
{{--                6到16个字符--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="layui-form-item">--}}
{{--            <label for="L_repass" class="layui-form-label">--}}
{{--                <span class="x-red">*</span>确认密码--}}
{{--            </label>--}}
{{--            <div class="layui-input-inline">--}}
{{--                <input type="password" id="L_repass" name="repass" required="" lay-verify="repass"--}}
{{--                       autocomplete="off" class="layui-input">--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button  class="layui-btn" lay-filter="edit" lay-submit="">
                修改
            </button>
        </div>
    </form>
</div>
<script>
    layui.use(['form','layer'], function(){
        $ = layui.jquery;
        var form = layui.form
            ,layer = layui.layer;

        //自定义验证规则
        form.verify({
            nikename: function(value){
                if(value.length < 5){
                    return '昵称至少得5个字符啊';
                }
            }
            ,pass: [/(.+){6,12}$/, '密码必须6到12位']
            ,repass: function(value){
                if($('#L_pass').val()!=$('#L_repass').val()){
                    return '两次密码不一致';
                }
            }
        });

        //监听提交
        form.on('submit(edit)', function(data){
            console.log(data);
            var uid = $("input[name='uid']").val();
            //发异步，把数据提交给php

            $.ajax({
                url: '/admin/user/'+uid,
                type:'PUT',
                dataType:'json',
                headers: { // 请求头 token
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:data.field, // 表单数据
                success: function(data) {
                    // 弹层提示添加成功，并刷新父页面
                    //console.log(data)
                    if(data.status == 0) {
                        layer.alert(data.message,{icon:6},function () {
                            // 刷新父页面
                            parent.location.reload(true);
                        })
                    } else {
                        layer.alert(data.message,{icon:5})
                    }
                },
                error: function () {
                    // 错误信息
                }
            })


            // layer.alert("增加成功", {icon: 6},function () {
            //     // 获得frame索引
            //     var index = parent.layer.getFrameIndex(window.name);
            //     //关闭当前frame
            //     parent.layer.close(index);
            // });
            return false;
        });


    });
</script>
<script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();</script>
</body>

</html>

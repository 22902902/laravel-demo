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
<div class="layui-anim layui-anim-up">
    <form class="layui-form sy_border" id="art_form" action="{{ url('admin/config') }}" method="post">



        <div class="layui-form-item">
            <label for="L_art_title" class="layui-form-label">
                <span class="x-red">*</span>标题
            </label>
            <div class="layui-input-block">
                {{ csrf_field() }}
                <input type="text" id="L_art_title" name="conf_title" required=""
                       autocomplete="off" class="layui-input">
            </div>
        </div>


        <div class="layui-form-item">
            <label for="L_art_editor" class="layui-form-label">
                <span class="x-red">*</span>名称
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_art_editor" name="conf_name" required=""
                       autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label for="L_art_editor" class="layui-form-label">
                <span class="x-red">*</span>类型
            </label>
            <div class="layui-input-block">
                <input type="radio" name="field_type" value="input" title="输入框" checked>
                <input type="radio" name="field_type" value="textarea" title="文本域" onclick>
                <input type="radio" name="field_type" value="radio" title="单选按钮" onclick>
            </div>
        </div>
        <input type="hidden" name="field_value" value="1">

        <div class="layui-form-item">
            <label for="L_art_tag" class="layui-form-label">
                <span class="x-red">*</span>排序
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_art_tag" name="conf_order" required=""
                       autocomplete="off" class="layui-input" value="0">
            </div>
        </div>


        <div class="layui-form-item">
            <label for="L_art_tag" class="layui-form-label">
                <span class="x-red">*</span>内容
            </label>
            <div class="layui-input-block">
                <textarea name="content" placeholder="请输入内容" class="layui-textarea" id="" cols="30" rows="10"></textarea>
            </div>
        </div>



        <div class="layui-form-item">
            <label for="L_art_tag" class="layui-form-label">
                <span class="x-red">*</span>说明
            </label>

            <div class="layui-input-block">
                <!-- 加载编辑器的容器 -->
                <script id="container" style="height: 300px;" name="conf_tips" type="text/plain">

                </script>
            </div>
        </div>


        <div class="layui-form-item tCenter">
            <button  class="layui-btn formbtn"  lay-submit="">增加</button>
        </div>
    </form>
</div>

<!-- 配置文件 -->
<script type="text/javascript" src="{{ asset('./ueditor/ueditor.config.js') }}"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="{{ asset('./ueditor/ueditor.all.js') }}"></script>
<script type="text/javascript" charset="utf-8" src="{{ asset('./ueditor/lang/zh-cn/zh-cn.js') }}"></script>
<script>
    // 实例化编辑器
    var ue = UE.getEditor('container');

    // 带token
    {{--$.ajaxSetup({--}}
    {{--    header : {--}}
    {{--        //'X-CSRF-TOKEN': '{{ csrf_token() }}'--}}
    {{--        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--    }--}}
    {{--});--}}

    // markdown ajax
    $('#previewBtn').click(function() {
        $.ajax({
            url: "/admin/article/per_mk",
            type: "post",
            headers: { // 请求头 token
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                cont: $('#z-textarea').val()
            },
            success:function (res) {
                $('#z-textarea-preview').html(res);
            },
            error:function (err) {
                console.log(err.responseText);
            }
        });
    })




    layui.use(['form','layer','upload','element'], function(){
        $ = layui.jquery;
        var form = layui.form
            ,layer = layui.layer;
        var upload = layui.upload;
        var element = layui.element;

        $('#test1').on('click', function () {
            $('#photo_upload').trigger('click');
            $('#photo_upload').on('change', function(){
                var obj = this;
                var formData = new FormData($('#art_form')[0]);
                $.ajax({
                    url: '/admin/article/upload',
                    type: 'post',
                    data: formData,
                    // 因为data值是FormData对象，不需要对数据做处理
                    processData: false, // 是否进行处理
                    contentType: false, // 类型
                    success: function(data) {
                        if(data['ServerNo'] == '200') {
                            // 如果成功
                            document.getElementById('thumb_img').style.display = 'block';
                            $('#thumb_img').attr('src','/uploads/'+data['ResultData']);
                            $('input[name=thumb]').val(data);
                            $(obj).off('change');
                        } else {
                            // 如果失败
                            alert(data['ResultData']);
                        }
                    },
                    error:function(XMLHttpRequest, textStatus, errorThrown) {
                        var number = XMLHttpRequest.status;
                        var info = "错误号"+number+"文件上传失败！";
                        // 将菊花换成原因
                        // $('#pic').attr('src', '/file.png');
                        alert(info);
                    },
                    async:true
                });
            });
        });


        //监听提交
        form.on('submit(add)', function(data){
            console.log(data);
            //发异步，把数据提交给php
            $.ajax({
                url: '/admin/config',
                type:'POST',
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

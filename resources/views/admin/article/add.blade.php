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
    <form class="layui-form sy_border" id="art_form" action="{{ url('admin/article') }}" method="post">

        <div class="layui-form-item">
            <label for="L_email" class="layui-form-label">
                <span class="x-red">*</span>分类
            </label>
            <div class="layui-input-inline">
                <select name="cate_id" id="">
                    @foreach($cate as $k => $v)
                        <option value="{{ $v->id }}">{{ $v->cate_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>
            </div>
        </div>


        <div class="layui-form-item">
            <label for="L_art_title" class="layui-form-label">
                <span class="x-red">*</span>文章标题
            </label>
            <div class="layui-input-block">
                {{ csrf_field() }}
                <input type="text" id="L_art_title" name="title" required=""
                       autocomplete="off" class="layui-input">
            </div>
        </div>


        <div class="layui-form-item">
            <label for="L_art_editor" class="layui-form-label">
                <span class="x-red">*</span>编辑
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_art_editor" name="editor" required=""
                       autocomplete="off" class="layui-input">
            </div>
        </div>


        <div class="layui-form-item layui-form-text">
            <label  class="layui-form-label">
                缩略图
            </label>
            <div class="layui-input-block layui-upload">
                <input type="hidden" id="img1" class="hidden" name="thumb" value="">
                <button type="button" class="layui-btn" id="test1">
                    <i class="layui-icon">&#xe67c</i>上传图片
                </button>
                <input type="file" name="photo" id="photo_upload" style="display: none"/>
            </div>
        </div>


        <div class="layui-form-item layui-form-text">
            <label  class="layui-form-label"></label>
            <div class="layui-input-block">
                <img src="" alt="" id="thumb_img" style="height: 400px; width: 300px;display: none">
            </div>
        </div>


        <div class="layui-form-item">
            <label for="L_art_tag" class="layui-form-label">
                <span class="x-red">*</span>关键词
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_art_tag" name="tag" required=""
                       autocomplete="off" class="layui-input">
            </div>
        </div>


        <div class="layui-form-item">
            <label for="L_art_tag" class="layui-form-label">
                <span class="x-red">*</span>描述
            </label>
            <div class="layui-input-block">
                <textarea name="descript" placeholder="请输入内容" class="layui-textarea" id="" cols="30" rows="10"></textarea>
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_art_tag" class="layui-form-label">
                <span class="x-red">*</span>Markdown
            </label>
            <div class="layui-input-block">
                
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_art_tag" class="layui-form-label">
                <span class="x-red">*</span>内容
            </label>

            <div class="layui-input-block">
                <!-- 加载编辑器的容器 -->
                <script id="container" style="height: 300px;" name="content" type="text/plain">

                </script>
            </div>
        </div>


        <div class="layui-form-item tCenter">
            <button  class="layui-btn formbtn" lay-filter="add" lay-submit="">增加</button>
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

    layui.use(['form','layer'], function(){
        $ = layui.jquery;
        var form = layui.form
            ,layer = layui.layer;

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
                url: '/admin/user',
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

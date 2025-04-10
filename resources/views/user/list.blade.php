<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{ asset('/js/layer/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('/js/layer/layer.js') }}"></script>
</head>
<body>
    <table>
        <tr>
            <td>ID</td>
            <td>用户名</td>
            <td>密码</td>
            <td>操作</td>
        </tr>
        @foreach($user as $v)
        <tr>
            <td>{{ $v->id  }}</td>
            <td>{{ $v->username  }}</td>
            <td>{{ $v->password }}</td>
            <td><a href="/user/edit/{{ $v->id }}">修改</a> | <a href="javascript:;" onclick="del_member(this, {{ $v->id  }})">删除</a></td>
        </tr>
        @endforeach
    </table>
    <style>
        table, tr, td {
            border: 1px solid black;
        }
    </style>

    <script>
        // 删除选中用户
        function del_member(obj, id) {
            //询问框
            layer.confirm('您确认要删除吗？', {
                btn: ['确认','取消'] //按钮
            }, function(){
                $.get('/user/del/'+id,function (data) {
                    console.log(data);
                    // 如果删除成功
                    if(data.status == 0){
                        $(obj).parents('tr').remove();
                        layer.msg(data.message, {icon:6});
                    } else {
                        layer.msg(data.message, {icon:5});
                    }

                })
            }, function(){

            });
        }
    </script>
</body>
</html>


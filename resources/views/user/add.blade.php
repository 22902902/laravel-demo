<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('/user/addstore') }}" method="post">
        <table>
            <!-- post直接提交会报错419，需要加个token -->
            {{ csrf_field() }}
            <tr>
                <td>姓名</td>
                <td><input type="text" name="name" /></td>
            </tr>
            <tr>
                <td>用户名</td>
                <td><input type="text" name="username" /></td>
            </tr>
            <tr>
                <td>邮箱</td>
                <td><input type="text" name="email" /></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="password" name="password" /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="提交" /></td>
            </tr>
        </table>
    </form>
</body>
</html>

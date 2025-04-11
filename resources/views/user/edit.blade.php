<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户修改</title>
</head>
<body>
<form action="{{ url('/user/update') }}" method="post">
    <table>
        <!-- post直接提交会报错419，需要加个token -->
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $user->id }}">
        <tr>
            <td>姓名</td>
            <td><input type="text" name="name" value="{{ $user->name }}" /></td>
        </tr>
        <tr>
            <td>用户名</td>
            <td><input type="text" name="username" value="{{ $user->username }}" /></td>
        </tr>
        <tr>
            <td>邮箱</td>
            <td><input type="text" name="email" value="{{ $user->email }}" /></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" value="修改" /></td>
        </tr>
    </table>
</form>
</body>
</html>


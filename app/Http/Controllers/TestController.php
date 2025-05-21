<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends BaseControllers
{
    // 测试 http://localhost:8013/api/test
    public function index(Request $request) {
        //return response()->json(['status' => 'success']);

        // dingo 响应
        // 返回数据集合
        //return User::all();

        // 返回单个数据
        //return User::find(1);

        //return User::findOrFail(1);

        // 使用响应生成器响应一个数组
        // return $this->response->array(['username' => 'admin','password' =>'123456']);

        // 异常

        // 无内容响应
        //return $this->response->noContent();

        // 一个自定义消息和状态码的普通错误
        //return $this->response->error('This is an error.' , 404);

        // 自定义响应 Symfony\Component 前面加\代表从根命名空间找
        //throw new \Symfony\Component\HttpKernel\Exception\BadRequestHttpException('请求错误.');

        // 资源异常
        // 定义规则
//        $rules = [
//            'username' => ['required', 'alpha'],
//            'password' => ['required', 'min:7']
//        ];
//
//        // 拿到参数
//        $payload = app('request')->only('username', 'password');
//
//        // 验证参数,规则
//        $validator = app('validator')->make($payload, $rules);
//
//        // 抛出异常并返回错误信息
//        throw new \Dingo\Api\Exception\StoreResourceFailedException('Could not create new user.', $validator->errors());

        // 表单验证异常
//        $validatedData = $request->validate([
//            'title' => 'required|unique:posts|max:255',
//            'body' => 'required',
//        ]);


        // 响应生成器使用Transformer
        //$user = User::find(1);
        //return $user; // 直接返回
        // return $this->response->item($user, new UserTransformer()); 响应一条数据

//        $user = User::all();
//        return $this->response->collection($user, new UserTransformer()); // 响应一个数组

        // 响应一个分页
        $users = User::paginate(4);

        return $this->response->paginator($users, new UserTransformer)
            ->withHeader('X-Foo', 'Bar') // 添加额外的头信息
            ->addMeta('foo', 'bar'); // 添加 Meta 信息






    }

    // http://localhost:8013/api/name
    public function name() {
        $url = app('Dingo\Api\Routing\UrlGenerator')->version('v1')->route('test.name');
        dd($url);
    }

    /**
     * 注册用户
     *
     * 使用 `username` 和 `password` 注册用户。
     *
     * @Post("/api/in")
     * @Versions({"v1"})
     * @Transaction({
     *      @Request({"username": "foo", "password": "bar"}),
     *      @Response(200, body={"id": 10, "username": "foo"}),
     *      @Response(422, body={"error": {"username": {"Username is already taken."}}})
     * })
     */
    public function users() {
        // 所有用户
//        $users = User::all();
//        return $this->response->collection($users, new UserTransformer);

        // 从token获取用户信息
//        $user = app('Dingo\Api\Auth\Auth')->user();
//        return $user;

//        $user = auth('api')->user();
//        return $user;

        // 门面
//        $user = Auth::guard('api')->user();
//        return $user;

        $user = $this->auth->user();
        return $user;
    }

    public function login(Request $request) {
//        $email = $request->input('email');
//        $password = $request->input('password');

        $credentials = request(['username', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            // return response()->json(['error' => 'Unauthorized'], 401);
            // dingo api
            return $this->response->errorUnauthorized();
        }

        return $this->respondWithToken($token);

    }


    protected function respondWithToken($token)
    {
        // 也可以 return response()->json([
        return $this->response->array([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }


    public function in() {
        // 内部调用
        // 分发器
        $dispatcher = app('Dingo\Api\Dispatcher');

        // 普通请求
//        $users = $dispatcher->get('api/test');
//        return $users;

        // 模拟用户
        $user = User::find(1);
        $users = $dispatcher->be($user)->get('api/users');
        return $users;
    }

    public function in2() {
        // 模拟用户
        $user = User::find(2);
        return $user;
    }

}

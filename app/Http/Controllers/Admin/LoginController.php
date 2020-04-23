<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    //构造方法
    public function __construct()
    {
        //$this->middleware(['check_admin:login']);
    }


    //登录显示
    public function index()
    {
        //判断用户是否已经登陆过
        if(auth()->check()){
            redirect(route('admin.index'));
        }
        return view('admin.login.login');
    }

    //登录
    public function login(Request $request)
    {
        //表单认证
       $post =  $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
        ],[
           'username.required'=>'账号都不写，想飞吗',
           'password.required'=>'密码都不写，想飞吗',
       ]);

       //登录
        $bool = auth()->guard('web')->attempt($post);
        if($bool){
            //auth()->user() 返回当前登录的用户模型对象 存储在session中
            //laravel默认session时存储在文件中 优化到memcached redis
//            $model = auth()->user();
//            dd($model->toArray());
            return redirect(route('admin.index'));
        }
        //withErrors 把信息写入到验证错误提示中 特殊的session laravel中叫 闪存
        //闪存 从设置好之后 只能在第一个http请求中获取到数据 以后就没有了
        return redirect(route('admin.login'))->withErrors(['error'=>'登录失败']);

    }
}

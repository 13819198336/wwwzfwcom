<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{


    //后台首页先
    public function index()
    {
        return view('admin.index.index');
    }

    //欢迎页面
    public function welcome()
    {
        return view('admin.index.welcome');
    }

    //退出
    public function logout()
    {
        auth()->logout();
        return redirect(route('admin.login'))->with('success','请重新登录');
    }
}

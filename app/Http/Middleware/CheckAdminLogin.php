<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param string $param 中间件传参  在绑定中间件地方 ：值
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

//        dd($param);
//        echo "我是一个中间件";

        if(!auth()->check()){
            return redirect(route('admin.login'))->withErrors(['error'=>'请登录']);
        }
        return $next($request);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/4/22/022
 * Time: 22:58
 */

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
    //登录显示
    Route::get('login','LoginController@index')->name('admin.login');
    //登录处理
    Route::post('login','LoginController@login')->name('admin.login');

//    Route::get('welcome','IndexController@welcome')->name('admin.welcome')->middleware(['check_admin']);


    Route::group(['middleware'=>['check_admin']],function (){
        //后台首页
        Route::get('index','IndexController@index')->name('admin.index');
        //欢迎页面
        Route::get('logout','IndexController@logout')->name('admin.logout');
        //退出
        Route::get('welcome','IndexController@welcome')->name('admin.welcome')->middleware(['check_admin']);
    });

});
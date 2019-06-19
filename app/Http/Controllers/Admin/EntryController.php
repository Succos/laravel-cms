<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoginForm;
use Auth;
class EntryController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('admin.entry.login');
    }
    public function loginHandle(LoginForm $request){

        $status=Auth::attempt([
            'name'=>$request->input('username'),
            'password'=>$request->input('password')
        ]);
       if ($status){
           return [
               'code'=>0,
               'msg'=>'登录成功'
           ];
       }else{
           return [
               'code'=>1,
               'msg'=>'账号 名称或者密码错误'
           ];
       }

    }
}

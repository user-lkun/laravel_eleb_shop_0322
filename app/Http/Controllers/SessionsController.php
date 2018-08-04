<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SessionsController extends Controller
{

    public function login(){
        if (Auth::check()){//判断是否已经登录
            return redirect('/shops');
        }
        return view('login/login');
    }
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required',
            'password'=>'required',
            'captcha'=>'required|captcha'
        ],[
            'name.required'=>'用户名不能为空',
            'password.required'=>'密码不能为空',
            'captcha.required'=>'验证码不能为空',
            'captcha.captcha'=>'验证码错误',
        ]);

        //获取商家状态
        $sta1 = DB::table('shop_users')->where('name', $request->name)->value('status');
        //获取店铺状态
        $sta2 = DB::select("select shops.status from shops JOIN shop_users on shops.id=shop_users.shop_id WHERE shop_users.name='$request->name'");
        if ($sta1==null ||$sta2==null){
            return  redirect('login')->with('danger','该商家不存在!');
        }
        $sta2 = $sta2[0]->status;
//        dd($sta2);
        if ($sta1!=1 || $sta2!=1){
            return  redirect('login')->with('danger','该商家未通过审核,请联系管理员!');
        }
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password],[$request->remeberMe])) {

            return redirect('/shops')->with('success','登陆成功');
        }else{
            return redirect()->back()->with('danger','用户名或密码错误')->withInput();
        }

    }
    public function destroy(){
        Auth::logout();
        return redirect('login')->with('success','退出成功');

    }
}


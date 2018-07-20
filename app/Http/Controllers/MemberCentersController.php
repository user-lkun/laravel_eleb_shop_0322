<?php

namespace App\Http\Controllers;

use App\Models\Shops;
use App\Models\ShopUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MemberCentersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[

        ]);
    }
    public function show(){
        $name = Auth::user()->name;
        $msg = DB::select("select * from shops JOIN shop_users on shops.id=shop_users.shop_id WHERE shop_users.name='$name'");
        $shops_msg = $msg[0];
        $shop_categories_name = DB::table('shop_categories')->where('id', $shops_msg->shop_category_id)->value('name');
        return view('membercenters/show',compact('shops_msg','shop_categories_name'));
    }

    public function edit(ShopUsers $shopuser){//修改表单

        return view('membercenters/edit',compact('shopuser'));
    }

    public function save(Request $request)
    {//修改保存

        $this->validate($request, [
            'oldpassword' => 'required',
            'newpassword' => 'required|min:6',
            'repassword' => 'required|min:6',
        ],[
            'oldpassword.required'=>'旧密码不能空',
            'newpassword.required'=>'新密码不能空',
            'newpassword.min'=>'新密码不能小于6位数',
            'repassword.required'=>'确认密码不能为空',
            'repassword.min'=>'密码不能小于6位数',
        ]);
        $dbpassword = DB::table('shop_users')->where('name', Auth::user()->name)->value('password');

        if (!Hash::check($request->oldpassword,$dbpassword)){
            session()->flash('danger','旧密码填写错误!');
            return redirect(url()->previous());
        }
        if ($request->newpassword != $request->repassword) {
            session()->flash('danger', '确认密码有误!');
            return redirect(url()->previous());
        }
        $newpassword = bcrypt($request->newpassword);
        DB::update("update shop_users set password ='$newpassword'  where name = ?", [Auth::user()->name]);
        session()->flash('success','修改成功');
        return redirect(url()->previous());
    }
}

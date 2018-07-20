<?php

namespace App\Http\Controllers;

use App\Models\Shop_categories;
use App\Models\Shops;
use App\Models\ShopUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ShopsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'only'=>['store']
        ]);
    }

    public function index(){
        return view('shops/index');
    }
    public function create(){
        $shop_categories = Shop_categories::all();
        return view('shops/create',compact('shop_categories'));
    }

    public function store(Request $request){

        $this->validate($request, [
//属于shops
            'name' => 'required|max:10',
            'password' => 'required|min:6',
            'repassword' => 'required',

//            'email' => 'required|unique:users,email,'.$old_email.',email',
            'email' => 'required|unique:shop_users',
//            'captcha' => 'required|captcha',

            //属于shopusers
//            'shop_category_id' => 'required',
            'shop_name' => 'required',
            'shop_img' => 'required',
//            'shop_rating' => 'required|numeric',
            'start_send' => 'required|numeric',
            'send_cost' => 'required|numeric',
            'notice' => 'required|max:255',
            'discount' => 'required|max:255',
        ],[
            //验证属于shops
            'name.required'=>'商家名不能为空',
            'name.max'=>'商家名不能超过10个字',
            'password.required'=>'密码不能为空',
            'password.min'=>'密码不能小于6位数',
            'repassword.required'=>'确认密码不能为空',



            'email.required'=>'邮箱不能为空',
            'email.unique'=>'邮箱已存在',


            //验证属于shopusers
//            'shop_category_id.required'=>'店铺分类不能为空',
            'shop_name.required'=>'店铺名称不能为空',
            'shop_img.required'=>'请上传店铺图像',
//            'shop_rating.required'=>'店铺评分不能为空',

            'shop_rating.numeric'=>'店铺评分必须为数字',

            'start_send.required'=>'起送金额不能为空',
            'start_send.numeric'=>'起送金额必须为数字',
            'send_cost.required'=>'配送费不能为空',
            'send_cost.numeric'=>'配送费必须为数字',
            'notice.required'=>'店公告不能为空',
            'notice.max'=>'店公告不能超过255个字',
            'discount.required'=>'优惠信息不能为空',
            'discount.max'=>'优惠信息不能超过255个字',

        ]);

        //处理图片
        $shop_img = $request->shop_img;
        $shop_img_name = $shop_img->store('public/shop_img');
        //图片存绝对路劲
        $img = Storage::url($shop_img_name);
        $true_path = url($img);


        if ($request->password!=$request->repassword){
            session()->flash('danger','两次输入密码不一样!');
            return redirect(url()->previous());
        }



        //对密码进行加密处理
        $password = bcrypt($request->password);
        $shop_rating=0;
        //添加到shops 表
        DB::beginTransaction();
        $shopsave = Shops::create(['shop_category_id'=> $request->shop_category_id,
            'shop_name'=>$request->shop_name,
            'shop_img'=>$true_path,
            'shop_rating'=>$shop_rating,
            'brand'=>$request->brand,
            'on_time'=>$request->on_time,
            'fengniao'=>$request->fengniao,
            'bao'=>$request->bao,
            'piao'=>$request->piao,
            'zhun'=>$request->zhun,
            'start_send'=>$request->start_send,
            'send_cost'=>$request->send_cost,
            'notice'=>$request->notice,
            'discount'=>$request->discount,
            'status'=>$request->status,
        ]);
//添加到shopusers 表
        $shopUsersave = ShopUsers::create(['name'=>$request->name,

            'shop_id'=>$shopsave->id,

            'password'=>$password,
            'email'=>$request->email,
            'status'=>$request->status]);

        if ($shopsave && $shopUsersave){
            DB::commit();
        }

        DB::rollBack();
        //添加成功,设置提示信息
        session()->flash('success','添加成功');
        return redirect("shops");

    }



}

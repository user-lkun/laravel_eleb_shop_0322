<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MenusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[

        ]);
    }
    public function index(){
        $menus = Menu::where('shop_id',Auth::user()->shop_id)->paginate();
        return  view('menus/index',compact('menus'));
    }
    public function create(){
        $menus_categories = MenuCategories::where('shop_id',Auth::user()->shop_id)->paginate();
        return view('menus/create',compact('menus_categories'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'goods_name' => 'required|max:10',
            'description' => 'required|max:255',
            'goods_price' => 'required|numeric',
            'goods_img' => 'required',
        ],[
            'goods_name.required'=>'菜名不能为空',
            'goods_name.max'=>'菜名不能超过10个字',
            'description.required'=>'分类描述不能为空',
            'description.max'=>'超过描述最大值:255字',
            'goods_price.required'=>'价格不能为空',
            'goods_price.numeric'=>'请输入正确的价格',
            'goods_img.required'=>'图片不能为空',
        ]);
        //处理图片
        $file = $request->goods_img;
        $head_name = $file->store('public/logo');
        $img  = Storage::url($head_name);
        $true_path = url($img);
        //给默认值
        $rating=0;
        Menu::create([
            'goods_name'=>$request->goods_name,
            'rating'=>0,
            'shop_id'=>Auth::user()->shop_id,
            'category_id'=>$request->category_id,
            'goods_price'=>$request->goods_price,
            'description'=>$request->description,
            'month_sales'=>0,
            'rating_count'=>0,
            'tips'=>0,
            'satisfy_count'=>0,
            'satisfy_rate'=>0,
            'goods_img'=>$true_path,
        ]);

        //添加成功,设置提示信息
        session()->flash('success','添加成功');
        return redirect("menus");
    }
    public function edit(Menu $menu){
        $menus_categories = MenuCategories::where('shop_id',Auth::user()->shop_id)->paginate();
        return view('menus/edit',compact('menu','menus_categories'));
    }

    public function update(Request $request,Menu $menu){

        $this->validate($request,[
            'goods_name' => 'required|max:10',
            'description' => 'required|max:255',
            'goods_price' => 'required|numeric',
        ],[
            'goods_name.required'=>'菜名不能为空',
            'goods_name.max'=>'菜名不能超过10个字',
            'description.required'=>'分类描述不能为空',
            'description.max'=>'超过描述最大值:255字',
            'goods_price.required'=>'价格不能为空',
            'goods_price.numeric'=>'请输入正确的价格',
        ]);
        //处理图片
        $file = $request->goods_img;
        if ($file!=null){//上传了新图片
            $head_name = $file->store('public/logo');
            $img  = Storage::url($head_name);
            $true_path = url($img);
            //给默认值
//        $rating=0;
            $menu->update([
                'goods_name'=>$request->goods_name,
//            'rating'=>0,
//            'shop_id'=>Auth::user()->shop_id,
                'category_id'=>$request->category_id,
                'goods_price'=>$request->goods_price,
                'description'=>$request->description,
//            'month_sales'=>0,
//            'rating_count'=>0,
//            'tips'=>0,
//            'satisfy_count'=>0,
//            'satisfy_rate'=>0,
                'goods_img'=>$true_path,
            ]);
        }else{
            $menu->update([
                'goods_name'=>$request->goods_name,
                'category_id'=>$request->category_id,
                'goods_price'=>$request->goods_price,
                'description'=>$request->description,
            ]);
//
        }


        //添加成功,设置提示信息
        session()->flash('success','修改成功');
        return redirect("menus");
    }
    public function destroy(Menu $menu){
        $menu->delete();
        session()->flash('success','删除成功');
        return redirect('menus');
    }
}

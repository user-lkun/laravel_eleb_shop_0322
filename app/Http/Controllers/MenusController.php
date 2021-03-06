<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuCategories;
use App\Models\OrderGoods;
use App\Models\Orders;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MenusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[

        ]);
    }

    public function index(Request $request){

        $wheres = [];
        $keywords = [];
        if($request->id){
//            $wheres['category_id']=$request->id;
            $wheres[] = ['category_id',$request->id];

            $keywords['id']=$request->id;
        }
        if ($request->keywords){
            $wheres[] = ['goods_name','like','%'.$request->keywords.'%'];
            $keywords['keywords']=$request->keywords;

        }

        if ($request->min_price){
            $wheres[] = ['goods_price','>',$request->min_price];
            $keywords['min_price']=$request->min_price;

        }

        if ( $request->max_price){
            $wheres[] =[ 'goods_price','<',$request->max_price];
            $keywords['max_price']=$request->max_price;
        }
//        if ($request->min_price || $request->max_price){
//            $menus = Menu::where('shop_id',Auth::user()->shop_id)
//                ->where($wheres)
//                ->where('goods_price','<',$request->max_price)
//                ->where('or')
//                ->where('goods_price','>',$request->min_price)
//                ->paginate(3);
//        }

            $menus = Menu::where('shop_id',Auth::user()->shop_id)
                ->where($wheres)
                ->paginate(3);

//        $menuCategories = MenuCategories::where('shop_id',Auth::user()->shop_id)->paginate();
        $menuCategories = DB::select('select * from menu_categories where shop_id = ?', [Auth::user()->shop_id]);

        return  view('menus/index',compact('menus','menuCategories','keywords'));
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
        //将图片传至阿里云
        //$storage = Storage::disk('oss');
       // $goods_img = $storage->putFile('goods_img', $request->goods_img);
       // $true_path =$storage-> url($goods_img);

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
            'goods_img'=>$request->goods_img,
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



        if ($request->goods_img!=null){//上传了新图片
            //将图片传至阿里云
            //$storage = Storage::disk('oss');
            //$goods_img = $storage->putFile('goods_img', $request->goods_img);
            //$true_path =$storage->url($goods_img);//保存真实路径
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
                'goods_img'=>$request->goods_img,
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

    public function show(Request $request){
//        $wheres = [];
//        $start_time=$request->start_time;
//        $end_time=$request->end_time;
//        if ($start_time) {
//            $wheres[] = 'created_at'. '>'. $start_time;
//        }
//        if ($end_time){
//            $wheres[]='created_at'.'<'.$end_time;
//        }
//
//        $wheres = implode(' and ',$wheres);//数组转为字符串
        $menus = Menu::where('shop_id',Auth::user()->shop_id)->get();//该商家的所有菜品

        $orders = Orders::select('id')
            ->where('shop_id',Auth::user()->shop_id)
            ->where('status','!=',-1)
            ->get();//该商家的所有未取消的订单id
        foreach ($orders as $order_id){
            $orders_id[]=$order_id->id;
        }
        ;
        $str_id = implode(',',$orders_id);//数组转为字符串
        if ($request->start_time){
            $res = DB::select("select goods_id ,sum(amount) as amount from order_goods  where  created_at>'$request->start_time' and order_id in ($str_id)  group by goods_id");
        }elseif($request->end_time){
            $res = DB::select("select goods_id ,sum(amount) as amount from order_goods  where  created_at<'$request->end_time' and order_id in ($str_id)  group by goods_id");
        }elseif($request->start_time && $request->end_time){
            $res = DB::select("select goods_id ,sum(amount) as amount from order_goods  where  created_at>'$request->start_time' and created_at<'$request->end_time' and order_id in ($str_id)  group by goods_id");
        }else{
            $res = DB::select("select goods_id ,sum(amount) as amount from order_goods  where   order_id in ($str_id)  group by goods_id");
        }

        foreach ($menus as $menu){
            foreach ($res as $val){
                if ($menu->id==$val->goods_id){
                    $menu['amount'] =$val->amount;//将商品总数添加至$menus里面
                }
            }
        }
        return view('menus/count',compact('menus'));
    }


}

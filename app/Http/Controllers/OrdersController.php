<?php

namespace App\Http\Controllers;

use App\Models\OrderGoods;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index(){
        $orders = Orders::where('shop_id',Auth::user()->shop_id)->paginate(2);
        return view('orders/index',compact('orders'));
    }
    public function show(Orders $order){
        $order_id = $order->id;
        $order_goods = OrderGoods::where('order_id',$order_id)->get();
        return view('orders/show',compact('order','order_goods'));
    }
    public function edit(Request $request){
        $status = $request->status;
        DB::update("update orders set status =$status where id = ?", [$request->id]);
            return redirect(route('orders.index'));
    }
    public function count(Request $request){
        $wheres = [];
        $start_time=$request->start_time;
        $end_time=$request->end_time;
        if ($start_time){
            $wheres[]=['created_at','>',$start_time];
        }
        if ($end_time){
            $wheres[]=['created_at','<',$end_time];
        }

        $count = DB::table('orders')
            ->where($wheres)
            ->where('shop_id',Auth::user()->shop_id)
            ->where('status','!=',-1)
            ->count();

        return view('orders/count',compact('count','start_time','end_time'));
    }
}

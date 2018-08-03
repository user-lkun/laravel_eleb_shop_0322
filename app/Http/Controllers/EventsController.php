<?php

namespace App\Http\Controllers;

use App\Models\EventPrizes;
use App\Models\Events;
use App\Models\EventShops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    public function index(){
        $events = Events::all();
        return view('events/index',compact('events'));
    }
    public function show(Events $event){
        return view('events/show',compact('event'));
    }
    public function apply(Events $event){//商家报名
        $events_id = $event->id;
        $shop_id = Auth::user()->shop_id;
        $num = Events::where('id',$events_id)->value('signup_num');//人数上限
        $apply_num = EventShops::where('events_id',$events_id)->count();//报名人数
        if ($apply_num>=$num){
            return redirect(route('events.index'))->with('danger','报名人数已满!下次再来!');
        }else{
            $res = EventShops::create([
                'events_id'=>$events_id,
                'shop_id'=>$shop_id,
            ]);
            return redirect(route('events.index'))->with('success','报名成功');
        }

    }
    //显示抽奖结果
    public function result(Events $event){
       $event_id = $event->id;
        $res = EventPrizes::where('events_id',$event_id)->get();
        return view('events/result',compact('res','event_id'));
    }
}

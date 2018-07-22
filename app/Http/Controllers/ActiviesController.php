<?php

namespace App\Http\Controllers;

use App\Models\Activies;
use Illuminate\Http\Request;

class ActiviesController extends Controller
{
    public function index(){

//        $activies = Activies::all();
        //商户端只显示没有过期的活动
        $activies = Activies::where('end_time','>',time())->paginate();
        return view('activies/index',compact('activies'));
    }
    public function show(Activies $activy){
        return view('activies/show',compact('activy'));
    }
}

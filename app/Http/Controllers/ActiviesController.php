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
//        return view('activies/index',compact('activies'));
        $contents = view('activies/index',compact('activies'));
        file_put_contents('index.html',$contents);
        return redirect('index.html');

    }
    public function show(Activies $activy){
//        return view('activies/show',compact('activy'));
        $contents = view('activies/show',compact('activy'));
        file_put_contents('show.html',$contents);
        return redirect('show.html');
    }
}

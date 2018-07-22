<?php

namespace App\Http\Controllers;

use App\Models\MenuCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MenuCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[

        ]);
    }

    public function index(){
        $menu_categories = MenuCategories::where('shop_id',Auth::user()->shop_id)->paginate();
        return view('menu_categories/index',compact('menu_categories'));
    }
    public function create(){

        return view('menu_categories/create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|max:10',
            'description' => 'required|max:255',
        ],[
            'name.required'=>'菜品分类名不能为空',
            'name.max'=>'商家名不能超过10个字',
            'description.required'=>'分类描述不能为空',
            'description.max'=>'超过描述最大值:255字',
        ]);
        if ($request->is_selected==1){
            DB::table('menu_categories')
                ->where('is_selected', 1)
                ->where('shop_id', Auth::user()->shop_id)
                ->update(['is_selected' =>0]);
        }
        MenuCategories::create([
            'name'=>$request->name,
            'shop_id'=>Auth::user()->shop_id,
            'description'=>$request->description,
            'type_accumulation'=>$request->type_accumulation,
            'is_selected'=>$request->is_selected
        ]);

        session()->flash('success','添加成功');
        return redirect('menucategories');
    }

    public function edit(MenuCategories $menucategory){
        return view('menu_categories/edit',compact('menucategory'));
    }

    public function update(MenuCategories $menucategory,Request $request){
        $this->validate($request,[
            'name' => 'required|max:10',
            'description' => 'required|max:255',
        ],[
            'name.required'=>'菜品分类名不能为空',
            'name.max'=>'商家名不能超过10个字',
            'description.required'=>'分类描述不能为空',
            'description.max'=>'超过描述最大值:255字',
        ]);
        if ($request->is_selected==1){
            DB::table('menu_categories')
                ->where('is_selected', 1)
                ->where('shop_id', Auth::user()->shop_id)
                ->update(['is_selected' =>0]);
        }
        $menucategory->update([
            'name'=>$request->name,
//            'shop_id'=>Auth::user()->shop_id,
            'description'=>$request->description,
//            'type_accumulation'=>$request->type_accumulation,
            'is_selected'=>$request->is_selected
        ]);

        session()->flash('success','修改成功');
        return redirect('menucategories');
    }
    public function destroy(MenuCategories $menucategory){

        $id = $menucategory->id;
        $res = DB::select("select goods_name from menus WHERE category_id=?",[$id]);
dd($res);

        if ($res==null){//判断文章类中是否存在文章,不存在就删除
            $menucategory->delete();
            session()->flash('success','删除成功');
            return redirect("menucategories");
        }else{
            session()->flash('danger','该类下面还存在菜品,不能被删除!');
            return redirect("menucategories");
        }

    }
}

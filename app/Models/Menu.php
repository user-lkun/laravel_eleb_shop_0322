<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'goods_name',
        'rating',
        'shop_id',
        'category_id',
        'goods_price',
        'description',
        'month_sales',
        'rating_count',
        'tips',
        'satisfy_count',
        'satisfy_rate',
        'goods_img',
    ];

    //建立菜品表和商家的关系 一对一(某一个商家只对应一个店铺)
    public function shops(){
        return $this->hasOne(Shops::class, 'id', 'shop_id');
    }

    //建立菜品表和菜品分类的关系 一对一(某一个商家只对应一个店铺)
    public function menu_categories(){
        return $this->hasOne(MenuCategories::class, 'id', 'category_id');
    }
}

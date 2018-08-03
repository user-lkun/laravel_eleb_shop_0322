<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'user_id',
        'shop_id',
        'sn',
        'province',
        'city',
        'county',
        'address',
        'tel',
        'name',
        'total',
        'status',
        'out_trade_no',

    ];

    //建立订单表和会员表的关系 一对一
    public function members(){
        return $this->hasOne(Members::class,'id','member_id');

    }
}

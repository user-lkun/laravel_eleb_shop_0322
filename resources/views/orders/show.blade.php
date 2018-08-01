@extends('default')
@section('content')
    @include('_left')
    @section('content_right')
    <h3>--订单详细信息--</h3>

    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">


        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">订单ID:</label>
            <div class="col-sm-9">
                {{$order->id}}
            </div>
        </div>


        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">所属会员:</label>
            <div class="col-sm-9">
               {{$order->Members->username}}
            </div>
        </div>





        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">订单编号:</label>
            <div class="col-sm-9">
                {{$order->sn}}
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">送货地址:</label>
            <div class="col-sm-9">
                {{$order->province.$order->city.$order->county.$order->address}}
            </div>
        </div>


        <div class="form-group" >
            <label for="inputTitle" class="col-sm-3 control-label">收货人姓名:</label>
            <div class="col-sm-9">
               {{$order->name}}

            </div>
        </div>
        <div class="form-group" >
            <label for="inputTitle" class="col-sm-3 control-label">收货人电话:</label>
            <div class="col-sm-9">
               {{$order->tel}}

            </div>
        </div>

        <div class="form-group" >
            <label for="inputTitle" class="col-sm-3 control-label">订单价格:</label>
            <div class="col-sm-9">
            {{$order->total}}

            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">订单状态:</label>

            @if($order->status==-1)
                已取消
            @elseif ($order->status==0)
                待支付
            @elseif ($order->status==1)
                待发货
            @elseif ($order->status==2)
                已发货
            @elseif ($order->status==3)
                待确认
            @elseif ($order->status==4)
                完成
            @endif
        </div>
        <div class="form-group" >
            <label for="inputTitle" class="col-sm-3 control-label">订单菜品信息:</label>
            <div class="col-sm-9">
                <table class="table">
                    @foreach($order_goods as $order_good)
                        <tr>
                            <td>{{$order_good->goods_name}}</td>
                            <td>{{$order_good->goods_price}}</td>
                            <td>{{$order_good->amount}}份</td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </form>


    @stop
@stop

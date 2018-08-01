@extends('default')
@section('content')
    @include('_left')
@section('content_right')

    <h3>--订单列表--</h3>

    <form action="{{route('orders.count')}}" class="navbar-form navbar-left" method="post">
        <div class="form-group">
            <input type="datetime-local" name="start_time" class="form-control" placeholder="开始时间">-
            <input type="datetime-local" name="end_time" class="form-control" placeholder="结束时间">
        </div>
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">订单统计</button>
    </form>
    {{--@foreach($menuCategories as $key=>$val)--}}
        {{--<a id="cate_{{$key}}" href="{{ route('menus.index',['id'=>$val->id]) }}"class="btn btn-success">{{$val->name}}</a>--}}
    {{--@endforeach--}}


    <table class="table table-hover">
        <tr class="info">
            <th>订单ID</th>
            <th>订单编号</th>
            {{--<th>详细地址</th>--}}
            {{--<th>收货人电话</th>--}}
            {{--<th>收货人</th>--}}
            {{--<th>订单价格</th>--}}
            <th>订单状态</th>
            <th>下单时间</th>
            <th>操作</th>
        </tr>
        @foreach($orders as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->sn}}</td>
                {{--<td>{{$val->province.$val->city.$val->county.$val->address}}</td>--}}

                {{--<td>{{$val->tel}}</td>--}}
                {{--<td>{{$val->name}}</td>--}}
                {{--<td>{{$val->total}}</td>--}}
                <td>
                @if($val->status==-1)
                    已取消
                    @elseif ($val->status==0)
                    待支付
                    @elseif ($val->status==1)
                    待发货
                    @elseif ($val->status==2)
                    已发货
                    @elseif ($val->status==3)
                    待确认
                    @elseif ($val->status==4)
                     完成
                    @endif
                </td>
                {{--状态(-1:已取消,0:待支付,1:待发货,2:待确认,3:完成)--}}
                <td>{{$val->created_at}}</td>

                <td>

                    <a href="{{route('orders.show',[$val])}}" title="查看订单" class="btn ">
                        <span class="glyphicon  glyphicon-zoom-in"></span>
                    </a>
                    {{--订单为取消状态是就禁用取消跟发货按钮--}}
                    @if($val->status==-1||$val->status==2)
                        <a href="{{route('orders.edit',['status'=>-1,'id'=>$val->id])}}" disabled="" title="取消订单" class="btn ">
                            取消订单
                        </a>
                        <a href="{{route('orders.edit',['status'=>2,'id'=>$val->id])}}" disabled="" title="发货" class="btn ">
                            发货
                        </a>
                     @else
                        <a href="{{route('orders.edit',['status'=>-1,'id'=>$val->id])}}" title="取消订单" class="btn ">
                            取消订单
                        </a>
                        <a href="{{route('orders.edit',['status'=>2,'id'=>$val->id])}}" title="发货" class="btn ">
                            发货
                        </a>
                     @endif


                </td>
            </tr>
        @endforeach
    </table>

    {{$orders->links()}}

@stop
@stop
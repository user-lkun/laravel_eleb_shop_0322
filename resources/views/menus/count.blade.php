@extends('default')
@section('content')
    @include('_left')
@section('content_right')

    <h3>--菜品销量统计--</h3>


    <div>
        <div class="pull-right">

            <form class="navbar-form navbar-left" action="{{route('menus.count')}}" method="get">
                <div class="form-group" >
                    <input type="datetime-local" name="start_time" class="form-control" width="20px" value="{{old('start_time')}}" placeholder="菜品名称">
                    -<input type="datetime-local" name="end_time" class="form-control" width="20px" value="{{old('end_time')}}" placeholder="开始价格">

                </div>
                <button type="submit" class="btn btn-default btn-info" >按时间统计销量</button>
            </form>
        </div>
    </div>


    <table class="table table-hover">

        <tr class="info">

            <th>菜品名称</th>

            <th>价格</th>

            <th>菜品图片</th>
            <th>菜品销量</th>
            {{--<th>操作</th>--}}
        </tr>
        @foreach($menus as $val)
            <tr>
                <td>{{$val->goods_name}}</td>
                <td>{{$val->goods_price}}</td>
                <td><img src="{{ $val->goods_img }}" alt="" width="100px"></td>

                <td>{{$val->amount==null?'0':$val->amount}}</td>
            </tr>
        @endforeach
    </table>

    {{--{{$menus->appends($keywords)->links()}}--}}

@stop
@stop
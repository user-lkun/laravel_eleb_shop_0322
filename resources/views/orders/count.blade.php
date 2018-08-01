@extends('default')
@section('content')
    @include('_left')
@section('content_right')

    <h3>--订单量统计--</h3>

        <div class="form-group">
            <input type="datetime-local" value="{{$start_time}}">-
            <input type="datetime-local" value="{{$end_time}}">
            <h2>本次查询结果共计:{{$count}}条!</h2>
            <a href="{{route('orders.index') }}" class="btn btn-success">返回</a>
        </div>




@stop
@stop
@extends('default')
@section('content')
    @include('_left')
@section('content_right')
    <h3>--抽奖结果--</h3>

<div class="container-fluid" style="text-align: center">
    <table class="table table-bordered table-hover" >
        <tr><td colspan="3" class="danger">{{\App\Models\Events::where('id',$event_id)->value('title')}}</td></tr>
        <tr class="info">
            <td>商家名称</td>
            <td>中奖结果</td>
            <td>奖品详情</td>
        </tr>
        @foreach($res as $val)
            <tr>
                <td>{{$val->shops->shop_name}}</td>
                <td>{{$val->name}}</td>
                <td>{!! $val->description !!}</td>
            </tr>
        @endforeach
    </table>
</div>
    <a href="{{route('events.index') }}" class="btn btn-success">返回</a>
    @stop
@stop
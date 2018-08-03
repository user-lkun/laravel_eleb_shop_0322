@extends('default')
@section('content')
    @include('_left')
@section('content_right')
    <h3>--平台抽奖活动--</h3>
    <table class="table table-hover">
        <tr class="info">
            <th>活动ID</th>
            <th>活动名称</th>

            {{--<th>活动详情</th>--}}
            <th>报名开始时间</th>
            <th>报名结束时间</th>
            <th>活动状态</th>
            <th>开奖时间</th>


            <th>操作</th>
        </tr>
        @foreach($events as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->title}}</td>
                {{--<td>{{$val->content}}</td>--}}
                <td>{{ date('Y-m-d　H:i:s',$val->signup_start) }}</td>
                <td>{{ date('Y-m-d　H:i:s',$val->signup_end) }}</td>
                <td>{{ $val->is_prize==1?'已结束':'进行中'}}</td>
                <td>{{ $val->prize_date }}</td>
                <td>



                    <a href="{{route('events.show',[$val])}}" title="查看" class="btn ">

                        <span class="btn btn-success">查看详情</span>
                    </a>


                    @if($val->is_prize==1)
                        <a href="{{route('events.result',[$val])}}"  class="btn ">
                            <span class="btn btn-success" >查看抽奖结果</span>
                        </a>
                     @endif
                </td>
            </tr>
        @endforeach
    </table>
    {{--{{ $events->links() }}--}}
    @stop
@stop

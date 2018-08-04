@extends('default')
@section('content')
    @include('_left')
@section('content_right')
    <h3>--查看抽奖活动详情--</h3>
    <a href="{{route('events.index') }}" class="btn btn-success">返回</a>
    @if(\App\Models\EventShops::where([
                      ['events_id',$event->id],
                       ['shop_id',auth()->user()->shop_id],
                       ])->count()==0)
            @if(time()>=$event->signup_start && time()<=$event->signup_end)
            <a href="{{route('events.apply',[$event->id])}}" title="报名" class="btn ">
                <span class="btn btn-success">立即报名</span>
            </a>
            @else
            <span class="btn btn-success">报名未开始</span>
            @endif
    @else
        <span class="btn btn-success" disabled="">已报名</span>
    @endif
    <form action=" " method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">活动名称:</label>
            <div class="col-sm-9 ">
                {{ $event->title }}
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">活动开始时间:</label>
            <div class="col-sm-9">
                {{date('Y-m-d H:i:s',$event->signup_start)}}
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">活动结束时间:</label>
            <div class="col-sm-9">
                {{date('Y-m-d H:i:s',$event->signup_end)}}
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">开奖时间:</label>
            <div class="col-sm-9">
                {{$event->prize_date}}
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">开奖状态:</label>
            <div class="col-sm-9">
                {{$event->is_prize==0?'未开奖':'已开奖'}}
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">活动详情:</label>
        </div>
        <div class="form-group">
           {!! $event->content !!}
        </div>
    </form>

    @stop
@stop



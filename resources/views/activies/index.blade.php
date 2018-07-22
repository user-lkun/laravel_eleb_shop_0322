@extends('default')
@section('content')
    @include('_left')
    @section('content_right')
        <h3>--平台活动列表--</h3>
        <table class="table table-hover">
            <tr class="info">
                <th>活动ID</th>
                <th>活动名称</th>
                {{--<th>活动详情</th>--}}
                <th>活动开始时间</th>
                <th>活动结束时间</th>

                <th>操作</th>
            </tr>
            @foreach($activies as $val)
                <tr>
                    <td>{{$val->id}}</td>
                    <td>{{$val->title}}</td>
                    <td>{{ date('Y-m-d　H:i:s',$val->start_time) }}</td>
                    <td>{{ date('Y-m-d　H:i:s',$val->end_time) }}</td>
                    <td>
                        &emsp;
                        <a href="{{route('activies.show',[$val])}}" title="查看活动详情" class="btn ">

                            <span class="glyphicon glyphicon-zoom-in"></span>
                        </a>

                 {{--<span style="float: left">--}}
                    {{--<form action="{{ route('activies.destroy',[$val]) }}" method="post" >--}}
                        {{--{{method_field('DELETE')}}--}}
                           {{--{{csrf_field()}}--}}
                           {{--<button title="删除"><span class="glyphicon glyphicon-trash"></span></button>--}}
                    {{--</form>--}}
                {{--</span>--}}
                    </td>
                </tr>
            @endforeach
        </table>


    @stop
@stop
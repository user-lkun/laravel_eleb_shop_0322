@extends('default')
@section('content')
    @include('_left')
@section('content_right')
    <h3>--菜品分类表--</h3>
    <table class="table table-hover">
        <tr class="info">
            <th>菜品分类ID</th>
            <th>分类名称</th>
            <th>所属商家</th>
            <th>描述</th>
            <th>是否是默认分类</th>

            <th>操作</th>
        </tr>
        @foreach($menu_categories as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td><a href="{{ route('menus.index',['id'=>$val->id]) }}" title="点击查看">{{$val->name}}</a></td>
                <td>{{auth()->user()->shops->shop_name}}</td>
                <td>{{$val->description}}</td>
                <td>{{$val->is_selected==1?'是':'否'}}</td>
                <td>
                    &emsp;
                    {{--<a href="" title="修改" class="btn ">--}}
                    <a href="{{route('menucategories.edit',[$val])}}" title="修改" class="btn ">

                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    {{--<a href="" title="添加" class="btn ">--}}

                    {{--<span class="glyphicon  glyphicon-plus"></span>--}}
                    {{--</a>--}}

                    <span style="float: left">
                   <form action="{{ route('menucategories.destroy',[$val]) }}" method="post" >
                    {{method_field('DELETE')}}
                       {{csrf_field()}}
                       <button title="删除"><span class="glyphicon glyphicon-trash"></span></button>
                </form>
                </span>

                </td>
            </tr>
        @endforeach
    </table>
    @stop
    @stop

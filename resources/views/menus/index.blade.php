@extends('default')
@section('content')
    @include('_left')
@section('content_right')
    <h3>--菜品列表--</h3>
    <table class="table table-hover">
        <tr class="info">
            <th>菜品ID</th>
            <th>菜品名称</th>
            <th>评分</th>
            <th>所属商家ID</th>
            <th>所属菜品分类ID</th>
            <th>价格</th>
            <th>描述</th>
            <th>月销量</th>
            <th>评分数量</th>
            <th>提示信息</th>
            <th>满意度数量</th>
            <th>满意度评分</th>
            <th>商品图片</th>
            <th>操作</th>
        </tr>
        @foreach($menus as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->goods_name}}</td>
                <td>{{$val->rating}}</td>

                <td>{{$val->shops->shop_name}}</td>
                <td>{{$val->menu_categories->name}}</td>
                <td>{{$val->goods_price}}</td>
                <td>{{$val->description}}</td>
                <td>{{$val->month_sales}}</td>
                <td>{{$val->rating_count}}</td>
                <td>{{$val->tips}}</td>
                <td>{{$val->satisfy_count}}</td>
                <td>{{$val->satisfy_rate}}</td>
                <td><img src="{{$val->goods_img}}" alt="" width="100px"></td>

                <td>
                    &emsp;
                    <a href="{{route('menus.edit',[$val])}}" title="修改" class="btn ">
                        {{--<a href="" title="修改" class="btn ">--}}

                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>

                    <a href="" title="查看" class="btn ">

                        <span class="glyphicon  glyphicon-zoom-in"></span>
                    </a>

                    <span style="float: left">
                   <form action="{{route('menus.destroy',[$val])}}" method="post" >
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
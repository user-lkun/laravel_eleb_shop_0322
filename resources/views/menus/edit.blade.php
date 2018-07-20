@extends('default')
@section('content')
    @include('_left')
@section('content_right')
    <h3>--修改菜品--</h3>

    <form action="{{ route('menus.update',[$menu]) }}" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">菜名:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="goods_name" placeholder="菜名" value="{{ $menu->goods_name }}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">所属菜类:</label>
            <div class="col-sm-9">
                <select name="category_id" id="">
                    @foreach($menus_categories as $val)
                        <option value="{{$val->id}}" {{$menu->category_id==$val->id?'selected':''}}>{{$val->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">价格:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="goods_price" placeholder="价格" value="{{ $menu->goods_price }}">
            </div>
        </div>



        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">菜品描述:</label>
            <div class="col-sm-9">
                <textarea name="description" id="" cols="30" rows="5">{{ $menu->description }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">菜品图片:</label>
            <div class="col-sm-9">
                <input type="file" name="goods_img">
                <img src="{{$menu->goods_img}}" alt="" width="100px">
            </div>
        </div>
        {{method_field('PATCH')}}
        {{csrf_field()}}
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@stop
@stop
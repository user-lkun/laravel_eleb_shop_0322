@extends('default')
@section('content')
    @include('_left')
@section('content_right')
    <h3>--添加分类--</h3>

    <form action="{{ route('menucategories.update',[$menucategory]) }}" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">分类名:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="name" placeholder="分类名" value="{{ $menucategory->name }}">
            </div>
        </div>
        {{--（随机字符串）--}}
        {{--<div class="form-group">--}}
            {{--<label for="inputCategroy" class="col-sm-3 control-label"></label>--}}
            {{--<div class="col-sm-9">--}}
                {{--<input type="hidden" class="form-control" id="inputCategroy" name="type_accumulation"  value="{{ mt_rand(0,100) }}">--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="form-group" >
            <label for="inputTitle" class="col-sm-3 control-label">所属商家:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="shop_id"  value="{{ auth()->user()->shops->shop_name }}" disabled>
            </div>
        </div>

        <div class="form-group" >
            <label for="inputTitle" class="col-sm-3 control-label">描述:</label>
            <div class="col-sm-9">
                <textarea   name="description" id="" cols="30" rows="5">{{ $menucategory->description }}</textarea>
            </div>

        </div>


        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否默认分类:</label>
            <div class="radio">
                <label>是 &emsp;&emsp;<input type="radio" name="is_selected" id="optionsRadios1" value="1" {{$menucategory->is_selected==1?'checked':''}}>
                </label>
                <label>否&emsp;&emsp;<input type="radio" name="is_selected" id="optionsRadios2" value="0" {{$menucategory->is_selected==0?'checked':''}}>
                </label>
            </div>
        </div>

        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label"></label>
            <div class="col-sm-8">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@stop
@stop
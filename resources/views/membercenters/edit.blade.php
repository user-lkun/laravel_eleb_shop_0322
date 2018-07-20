@extends('default')
@section('content')
    @include('_left')
    @section('content_right')
    <h3>--修改密码--</h3>

    <form action="{{ route('membercenters.save',[auth()->user()->id]) }}" method="post"  class="form-horizontal" style="width: 50%;margin: 50px auto">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">用户名:</label>
            <div class="col-sm-9">
                <input type="text" name="name" placeholder="{{auth()->user()->name}}" disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">旧密码:</label>
            <div class="col-sm-9">
                <input type="password" name="oldpassword" >
            </div>
        </div>


        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">新密码:</label>
            <div class="col-sm-9">
                <input type="password" name="newpassword" >
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">确认密码:</label>
            <div class="col-sm-9">
                <input type="password" name="repassword" >
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label"></label>
            <div class="col-sm-9">
                <input type="submit" value="确认修改" >
            </div>
        </div>


    </form>

    @stop

@stop
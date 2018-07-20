@extends('default')
@section('content_right')
        <h3>商家登录</h3>
        <form action="{{ route('login') }}" method="post"style="width: 30%;margin: 50px auto" >

            <div class="form-group">
                <label for="adduser">用户名:</label>
                <input type="text" class="form-control" name="name" id="adduser" >
            </div>
            <div class="form-group">
                <label for="addpwd">密码:</label>
                <input type="password" class="form-control" name="password" id="addpwd" >
            </div>


            <div class="form-group">
                <label for="captcha">验证码：</label>

                <input id="captcha" class="form-control" name="captcha" >
                <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">

            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remeberMe">记住我
                </label>
            </div>
            {{ csrf_field() }}
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" value="登录">
            </div>
        </form>


@stop
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Shop</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.css" rel="stylesheet">
</head>
<body >
<div class="container">
    <nav class="navbar  navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">商户Logo</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class=""><a href="#">商户后台 <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">下载</a></li>

                </ul>
{{--搜索框--}}
                {{--<form class="navbar-form navbar-left">--}}
                    {{--<div class="form-group">--}}
                        {{--<input type="text" class="form-control" placeholder="Search">--}}
                    {{--</div>--}}
                    {{--<button type="submit" class="btn btn-default">Submit</button>--}}
                {{--</form>--}}
                <ul class="nav navbar-nav navbar-right" style="width:300px;">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">文档 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>

                    <li><a href="#">日志</a></li>

                    @if(auth()->check())
                        {{--显示头像--}}
                        {{--<img style="margin-top: 5px" class="img-circle" src="{{\Illuminate\Support\Facades\Storage::url(\Illuminate\Support\Facades\Auth::user()->head) }}" alt="" width="40px">--}}
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('membercenters.show',[auth()->user()->id]) }}">个人中心</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <form action="{{ route('logout') }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-link">退出</button>
                                </form>
                            </ul>
                        @else
                            <ul class="nav navbar-nav">
                                    <li >
                                        <a href="{{ route('login') }}" class="btn btn-link">商家登录</a>
                                    </li>
                                    <li class="active">
                                        <a href="{{ route( 'shops.create') }}" class="btn btn-link">注册</a>
                                    </li>

                            </ul>

                        </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>

<div class="container-fluid" style="background: #adaeff">
    <div class="container " style="height: 65px">
        <h3>商户后台管理</h3>
    </div>
</div>
@include('_errors')
{{--显示错误信息--}}
@include('_message')
    <div class="container" style="padding: 20px 10px ;background-color: rgba(90,47,180,0.29)">

        <div class="bs-example col-lg-2" data-example-id="vertical-button-group" style="">
            @yield('content')
        </div>

        <div class="col-lg-10">
            @yield('content_right')
        </div>
    </div>

<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="/js/jquery-3.2.1.min.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="/js/bootstrap.js"></script>
</body>
</html>
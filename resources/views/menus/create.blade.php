@extends('default')
@section('content')
    @include('_left')
@section('content_right')
    <h3>--添加菜品--</h3>

    <form action="{{ route('menus.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">菜名:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="goods_name" placeholder="菜名" value="{{ old('goods_name') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">所属菜类:</label>
            <div class="col-sm-9">
                <select name="category_id" id="">
                    @foreach($menus_categories as $val)
                        <option value="{{$val->id}}">{{$val->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">价格:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="goods_price" placeholder="价格" value="{{ old('goods_price') }}">
            </div>
        </div>



        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">菜品描述:</label>
            <div class="col-sm-9">
                <textarea name="description" id="" cols="30" rows="5">{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">菜品图片:</label>
            <input type="hidden" id="goods_img_url" name="goods_img">
            <!--dom结构部分-->
            <div id="uploader-demo">
                <!--用来存放item-->
                <div id="fileList" class="uploader-list"></div>
                <div id="filePicker">选择图片</div>
            </div>

        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label"></label>
            <div class="col-sm-9">
                <img id="goods_img" src="" alt="" width="150px">
            </div>
        </div>

        {{csrf_field()}}
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>

    <script>
        // 初始化Web Uploader
        var uploader = WebUploader.create({

            // 选完文件后，是否自动上传。
            auto: true,

            // swf文件路径
            //swf: BASE_URL + '/js/Uploader.swf',

            // 文件接收服务端。
            server:"{{route('upload')}}",

            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#filePicker',

            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/gif,image/jpg,image/jpeg,image/bmp,image/png'
            },
            formData:{
              _token:'{{csrf_token()}}'
            },
        })
        uploader.on('uploadSuccess',function (file,response) {
            console.log(response)
            $('#goods_img').attr('src',response.fileName)
            $('#goods_img_url').val(response.fileName)
        })
    </script>
    @stop

@stop





@extends('default')
@section('content')
    @include('_left')
@section('content_right')
    <h3>--添加菜品--</h3>

    <form action="{{ route('menus.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">菜名:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="goods_name" placeholder="菜名" value="{{ old('goods_name') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">所属菜类:</label>
            <div class="col-sm-9">
                <select name="category_id" id="">
                    @foreach($menus_categories as $val)
                        <option value="{{$val->id}}">{{$val->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">价格:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="goods_price" placeholder="价格" value="{{ old('goods_price') }}">
            </div>
        </div>



        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">菜品描述:</label>
            <div class="col-sm-9">
                <textarea name="description" id="" cols="30" rows="5">{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">菜品图片:</label>
            <div class="col-sm-9">
                <input type="file" name="goods_img">
            </div>
        </div>

        {{csrf_field()}}
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@stop
@stop
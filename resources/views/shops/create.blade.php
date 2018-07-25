@extends('default')
@section('content_right')
    <h3>--商家注册--</h3>

    <form action="{{ route('shops.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">


        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">商家名称:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="name" placeholder="商家名" value="{{ old('name') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">商家密码:</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="inputCategroy" name="password" placeholder="商家密码" ">
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">确认密码:</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="inputCategroy" name="repassword" placeholder="确认密码" >
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">商家邮箱:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="email" placeholder="商家邮箱" value="{{ old('email') }}">
            </div>
        </div>





        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">店铺所属分类:</label>
            <div class="col-sm-9">
                <select name="shop_category_id" id="">
                    @foreach($shop_categories as $val)
                        <option value="{{$val->id}}">{{$val->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">店铺名称:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="shop_name" placeholder="店铺名称" value="{{ old('shop_name') }}">
            </div>
        </div>


        <div class="form-group" >
            <label for="inputTitle" class="col-sm-3 control-label">店铺图片:</label>
            <input type="hidden" id="shop_img_url" name="shop_img">
            <div class="col-sm-9">
                <div id="uploader-demo">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list"></div>
                    <div id="filePicker">选择图片</div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label"></label>
            <div class="col-sm-9">
                <img id="shop_img" src="" alt="" width="150px">
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否品牌:</label>
            <div class="radio">
                <label>是 &emsp;&emsp;<input type="radio" name="brand" id="optionsRadios1" value="1">
                </label>
                <label>否&emsp;&emsp;<input type="radio" name="brand" id="optionsRadios2" value="0" checked>
                </label>
            </div>
        </div>


        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否准时送达:</label>
            <div class="radio">
                <label>是 &emsp;&emsp;<input type="radio" name="on_time" id="optionsRadios1" value="1">
                </label>
                <label>否&emsp;&emsp;<input type="radio" name="on_time" id="optionsRadios2" value="0" checked>
                </label>
            </div>
        </div>


        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否蜂鸟配送:</label>
            <div class="radio">
                <label>是 &emsp;&emsp;<input type="radio" name="fengniao" id="optionsRadios1" value="1">
                </label>
                <label>否&emsp;&emsp;<input type="radio" name="fengniao" id="optionsRadios2" value="0" checked>
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否保标记:</label>
            <div class="radio">
                <label>是 &emsp;&emsp;<input type="radio" name="bao" id="optionsRadios1" value="1">
                </label>
                <label>否&emsp;&emsp;<input type="radio" name="bao" id="optionsRadios2" value="0" checked>
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否票标记:</label>
            <div class="radio">
                <label>是 &emsp;&emsp;<input type="radio" name="piao" id="optionsRadios1" value="1">
                </label>
                <label>否&emsp;&emsp;<input type="radio" name="piao" id="optionsRadios2" value="0" checked>
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否准标记:</label>
            <div class="radio">
                <label>是 &emsp;&emsp;<input type="radio" name="zhun" id="optionsRadios1" value="1">
                </label>
                <label>否&emsp;&emsp;<input type="radio" name="zhun" id="optionsRadios2" value="0" checked>
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">起送金额:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="start_send" placeholder="起送金额" value="{{ old('start_send') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">配送费:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCategroy" name="send_cost" placeholder="配送费" value="{{ old('send_cost') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">店公告:</label>
            <div class="col-sm-9">
                <textarea name="notice" id="" cols="30" rows="5" >{{old('notice')}}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">优惠信息:</label>
            <div class="col-sm-9">
                <textarea name="discount" id="" cols="30" rows="5" ></textarea>
            </div>
        </div>
        <div class="form-group">
            <input type="hidden" name="status" id="optionsRadios2" value="0" checked>
        </div>

        {{csrf_field()}}

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">提交审核</button>
            </div>
        </div>
    </form>
    <script>
        // 初始化Web Uploader
        var uploader = WebUploader.create({

            // 选完文件后，是否自动上传。
            auto: true,

            // swf文件路径   flash用
           // swf: BASE_URL + '/js/Uploader.swf',

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

        });

        uploader.on('uploadSuccess',function (file,response) {
            console.log(response)
            $('#shop_img').attr('src',response.fileName)
            $('#shop_img_url').val(response.fileName)
        })
    </script>
@stop

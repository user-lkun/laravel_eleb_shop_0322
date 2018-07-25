@extends('default')
@section('content')
    @include('_left')
    @section('content_right')
    <h3>--商家个人详细信息--</h3>

    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">


        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">商家名称:</label>
            <div class="col-sm-9">
                {{$shops_msg->name}}
            </div>
        </div>


        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">商家邮箱:</label>
            <div class="col-sm-9">
               {{$shops_msg->email}}
            </div>
        </div>





        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">店铺所属分类:</label>
            <div class="col-sm-9">
                {{$shop_categories_name}}
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">店铺名称:</label>
            <div class="col-sm-9">
                {{$shops_msg->shop_name}}
            </div>
        </div>


        <div class="form-group" >
            <label for="inputTitle" class="col-sm-3 control-label">店铺图片:</label>
            <div class="col-sm-9">
                <img src="{{$shops_msg->shop_img}}" alt="">

            </div>
        </div>



        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否品牌:</label>
            <div class="radio">
                {{$shops_msg->brand==1?'是':'否'}}

            </div>
        </div>


        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否准时送达:</label>
            <div class="radio">
                {{$shops_msg->on_time==1?'是':'否'}}

            </div>
        </div>


        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否蜂鸟配送:</label>
            <div class="radio">
                {{$shops_msg->fengniao==1?'是':'否'}}
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否保标记:</label>
            <div class="radio">
                {{$shops_msg->bao==1?'是':'否'}}
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否票标记:</label>
            <div class="radio">

                {{$shops_msg->piao==1?'是':'否'}}
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否准标记:</label>
            <div class="radio">
                {{$shops_msg->zhun==1?'是':'否'}}

            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">起送金额:</label>
            <div class="col-sm-9 radio">
                {{$shops_msg->start_send}}

            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">配送费:</label>
            <div class="col-sm-9 radio">
                {{$shops_msg->send_cost}}

            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">店公告:</label>
            <div class="col-sm-9 radio">
                {{$shops_msg->notice}}

            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">优惠信息:</label>
            <div class="col-sm-9 radio">
                {{$shops_msg->discount}}

            </div>
        </div>
        <div class="form-group">
            <input type="hidden" name="status" id="optionsRadios2" value="0" checked>
        </div>


    </form>



    @stop
@stop@extends('default')
@section('content')
    @include('_left')
    @section('content_right')
    <h3>--商家个人详细信息--</h3>

    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 50%;margin: 50px auto">


        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">商家名称:</label>
            <div class="col-sm-9">
                {{$shops_msg->name}}
            </div>
        </div>


        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">商家邮箱:</label>
            <div class="col-sm-9">
               {{$shops_msg->email}}
            </div>
        </div>





        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">店铺所属分类:</label>
            <div class="col-sm-9">
                {{$shop_categories_name}}
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">店铺名称:</label>
            <div class="col-sm-9">
                {{$shops_msg->shop_name}}
            </div>
        </div>


        <div class="form-group" >
            <label for="inputTitle" class="col-sm-3 control-label">店铺图片:</label>
            <div class="col-sm-9">
                <img src="{{$shops_msg->shop_img}}" alt="">

            </div>
        </div>



        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否品牌:</label>
            <div class="radio">
                {{$shops_msg->brand==1?'是':'否'}}

            </div>
        </div>


        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否准时送达:</label>
            <div class="radio">
                {{$shops_msg->on_time==1?'是':'否'}}

            </div>
        </div>


        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否蜂鸟配送:</label>
            <div class="radio">
                {{$shops_msg->fengniao==1?'是':'否'}}
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否保标记:</label>
            <div class="radio">
                {{$shops_msg->bao==1?'是':'否'}}
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否票标记:</label>
            <div class="radio">

                {{$shops_msg->piao==1?'是':'否'}}
            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">是否准标记:</label>
            <div class="radio">
                {{$shops_msg->zhun==1?'是':'否'}}

            </div>
        </div>
        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">起送金额:</label>
            <div class="col-sm-9">
                {{$shops_msg->start_send}}

            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">配送费:</label>
            <div class="col-sm-9">
                {{$shops_msg->send_cost}}

            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">店公告:</label>
            <div class="col-sm-9">
                {{$shops_msg->notice}}

            </div>
        </div>

        <div class="form-group">
            <label for="inputCategroy" class="col-sm-3 control-label">优惠信息:</label>
            <div class="col-sm-9">
                {{$shops_msg->discount}}

            </div>
        </div>
        <div class="form-group">
            <input type="hidden" name="status" id="optionsRadios2" value="0" checked>
        </div>


    </form>



    @stop
@stop
@extends('layout.default')

@section('contents')
    <!--引入CSS-->
    <link rel="stylesheet" type="text/css" href="/webuploader/webuploader.css">

    <!--引入JS-->
    <script type="text/javascript" src="/webuploader/webuploader.js"></script>
    @include('layout._errors')
    <form action="{{route('shop.update',[$shop])}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">店铺分类</label>
            <select class="form-control" name="shop_category_id">
                @foreach($shopcategories as $shopcategory)
                    <option value="{{$shopcategory->id}}" selected>{{$shopcategory->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">名称</label>
            <input name="shop_name" type="text" class="form-control" id="exampleInputEmail1" value="{{$shop->shop_name}}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">评分</label>
            <input name="shop_rating" type="text" class="form-control" id="exampleInputEmail1"  value="{{$shop->shop_rating}}">
        </div>
        <div>
            <span>
                <label for="exampleInputEmail1">是否是品牌:</label>
            <input type="radio" name="brand" value="1"  @if($shop->brand==1) checked @endif>是
            <input type="radio" name="brand" value="0" @if($shop->brand==0) checked @endif>不是
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </span>

            <span>
                <label for="exampleInputEmail1">是否准时送达:</label>
            <input type="radio" name="on_time" value="1" @if($shop->on_time==1) checked @endif>是
            <input type="radio" name="on_time" value="0" @if($shop->on_time==0) checked @endif>不是
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </span>

            <span>
                <label for="exampleInputEmail1">是否蜂鸟配送:</label>
            <input type="radio" name="fengniao" value="1" @if($shop->fengniao==1) checked @endif>是
            <input type="radio" name="fengniao" value="0" @if($shop->fengniao==0) checked @endif>不是
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </span>

            <span>
                <label for="exampleInputEmail1">是否保标记:</label>
            <input type="radio" name="bao" value="1" @if($shop->bao==1) checked @endif>是
            <input type="radio" name="bao" value="0" @if($shop->bao==0) checked @endif>不是
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </span>

            <span>
                <label for="exampleInputEmail1">是否票标记:</label>
            <input type="radio" name="piao" value="1" @if($shop->piao==1) checked @endif>是
            <input type="radio" name="piao" value="0" @if($shop->piao==0) checked @endif>不是
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </span>

            <span>
                <label for="exampleInputEmail1">是否准标记:</label>
            <input type="radio" name="zhun" value="1" @if($shop->zhun==1) checked @endif>是
            <input type="radio" name="zhun" value="0" @if($shop->zhun==0) checked @endif>不是
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </span>
        </div>
        <div class="form-group">

        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">起送金额</label>
            <input name="start_send" type="text" class="form-control" id="exampleInputEmail1"  value="{{$shop->start_send}}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">配送费</label>
            <input name="send_cost" type="text" class="form-control" id="exampleInputEmail1" value="{{$shop->send_cost}}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">店公告</label>
            <textarea class="form-control" rows="3" name="notice" placeholder="店公告">{{$shop->notice}}</textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">优惠信息</label>
            <textarea class="form-control" rows="3" name="discount" placeholder="优惠信息">{{$shop->discount}}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">状态</label>
            <select class="form-control" name="status">
                <option value="1" @if($shop->status==1) selected @endif>正常</option>
                <option value="0" @if($shop->status==0) selected @endif>待审核</option>
                <option value="-1" @if($shop->status==-1) selected @endif>禁用</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">店铺图片</label><br/>
            <input type="hidden" name="shop_imgs" value="{{$shop->shop_img}}">
            <img src="{{$shop->shop_img}}" width="50px">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">店铺图片</label>
            <input type="text"  name="shop_img" id="img">
            <div id="uploader-demo">
                <!--用来存放item-->
                <div id="fileList" class="uploader-list"></div>
                <div id="filePicker">选择图片</div>
            </div>
            <img id="pic" src="{{old('shop_img')}}"/>
        </div>


        {{csrf_field()}}
        {{ method_field('PUT') }}
        <button type="submit" class="btn btn-default">修改</button>
    </form>

@stop
@section('javascript')
    <script>
        var uploader = WebUploader.create({

            // 选完文件后，是否自动上传。
            auto: true,

            // swf文件路径
            // swf: BASE_URL + '/js/Uploader.swf',

            // 文件接收服务端。
            server: '{{ route('upload') }}',

            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#filePicker',

            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            },
            formData:{
                _token:'{{csrf_token()}}'
            }
        });
        uploader.on( 'uploadSuccess', function(file,response) {
            $("#pic").attr('src',response.path)
            $("#img").val(response.path)
        });
    </script>

@stop

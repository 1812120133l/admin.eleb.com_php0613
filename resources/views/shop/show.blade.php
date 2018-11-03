@extends('layout.default')

@section('contents')

        <div class="page-header">
            <h1> <small>商家审核</small></h1>
        </div>
        <table class="table table-hover">
            <tr>
                <th>商品分类名</th>
                <th>名称</th>
                <th>店铺图片</th>
                <th>评分</th>
                <th>是品牌</th>
                <th>准时送达</th>
                <th>蜂鸟配送</th>
                <th>保标记</th>
                <th>票标记</th>
                <th>准标记</th>
                <th>起送金额</th>
                <th>配送费</th>
                <th>优惠信息</th>
                <th>店公告</th>
                <th>操作</th>
            </tr>
            @foreach($shops as $shop)
                <tr>
                    <td>{{$shop->shop_category_id}}</td>
                    <td>{{$shop->shop_name}}</td>
                    <td>@if($shop->shop_img)<img src="{{\Illuminate\Support\Facades\Storage::url($shop->shop_img)}}" width="50px">@endif</td>
                    <td>{{$shop->shop_rating}}</td>
                    <td>@if($shop->brand) 是 @else 否 @endif</td>
                    <td>@if($shop->on_time) 是 @else 否 @endif</td>
                    <td>@if($shop->fengniao) 是 @else 否 @endif</td>
                    <td>@if($shop->bao) 是 @else 否 @endif</td>
                    <td>@if($shop->piao) 是 @else 否 @endif</td>
                    <td>@if($shop->zhun) 是 @else 否 @endif</td>
                    <td>{{$shop->start_send}}</td>
                    <td>{{$shop->send_cost}}</td>
                    <td>{{$shop->notice}}</td>
                    <td>{{$shop->discount}}</td>
                    <td><a class="btn btn-default" href="{{route('shop.audit',['id' => $shop->id,'status' => 1])}}" role="button">通过</a> <a class="btn btn-default" href="{{route('shop.audit',['id' => $shop->id,'status' => -1])}}" role="button">禁用</a></td>
                </tr>
            @endforeach
        </table>
@stop
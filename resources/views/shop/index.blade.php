@extends('layout.default')

@section('contents')
    @include('layout._notice')
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
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach($shops as $shop)
            <tr>
                <td>{{$shop->category->name}}</td>
                <td>{{$shop->shop_name}}</td>
                <td><img src="{{$shop->shop_img}}" width="50px"></td>
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
                <td>@if($shop->status==1) 正常 @elseif($shop->status==0) 待审核 @else 禁用 @endif</td>
                <td><a class="btn btn-default" href="{{route('shop.edit',[$shop])}}" role="button">修改</a> <form method="post" action="{{route('shop.destroy',[$shop])}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">删除</button>
                    </form> </td>

            </tr>
        @endforeach
    </table>
    {{ $shops->links() }}
@stop
@extends('layout.default')

@section('contents')
    @include('layout._notice')
    <table class="table table-hover">
        <tr>
            <th>商家用户名</th>
            <th>商家邮箱</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach($merchants as $merchants)
            <tr>
                <td>{{$merchants->name}}</td>
                <td>{{$merchants->email}}</td>
                <td>@if($merchants->status==1) 正常 @else 禁用 @endif</td>
                <td>@if($merchants->status==1) <a class="btn btn-default" href="{{route('merchant.audit',['id' => $merchants->id,'status' => 0])}}" role="button">禁用</a> @else <a class="btn btn-default" href="{{route('merchant.audit',['id' => $merchants->id,'status' => 1])}}" role="button">允许使用</a> @endif <a class="btn btn-default" href="{{route('merchant.reset',['id' => $merchants->id])}}" role="button">重置密码</a></td>
            </tr>
        @endforeach
    </table>

@stop
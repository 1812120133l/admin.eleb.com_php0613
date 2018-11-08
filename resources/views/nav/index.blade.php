@extends('layout.default')

@section('contents')
    <h1>导航列表</h1>
    @include('layout._notice')
    <table class="table table-hover">
        <tr>
            <th>名称</th>
            <th>地址/路由</th>
            <th>权限</th>
            <th>操作</th>
        </tr>
        @foreach($navs as $nav)
            <tr>
                <td>@if($nav->pid!=0) —— @endif{{$nav->name}}</td>
                <td>{{$nav->url}}</td>
                <td>{{$nav->permission_id}}</td>
                <td><a class="btn btn-default" role="button" href="{{route('nav.edit',[$nav])}}">修改</a></td>
            </tr>
        @endforeach
    </table>

@stop
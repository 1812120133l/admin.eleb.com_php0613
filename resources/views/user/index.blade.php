@extends('layout.default')

@section('contents')
    <h1>用户列表</h1>
    @include('layout._notice')
    <table class="table table-hover">
        <tr>
            <th>用户</th>
            <th>邮箱</th>
            <th>创建时间</th>
            <th>修改时间</th>
            <th>操作</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
            <td><a class="btn btn-default" role="button" href="{{route('admin.edit',[$user])}}">修改</a></td>
        </tr>
            @endforeach
    </table>

    @stop
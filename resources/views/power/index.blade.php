@extends('layout.default')

@section('contents')
    <h1>权限列表</h1>
    @include('layout._notice')
    <table class="table table-hover">
        <tr>
            <th>id</th>
            <th>权限名称</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        @foreach($powers as $power)
            <tr>
                <td>{{$power->id}}</td>
                <td>{{$power->name}}</td>
                <td>{{$power->created_at}}</td>
                <td><a class="btn btn-default" role="button" href="{{route('power.modify',[$power])}}">修改</a><form method="post" action="{{route('power.destroy',[$power])}}">
                        {{ csrf_field() }}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@stop
@extends('layout.default')

@section('contents')
    <h1>权限列表</h1>
    @include('layout._notice')
    <table class="table table-hover">
        <tr>
            <th>id</th>
            <th>角色名称</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        @foreach($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>{{$role->created_at}}</td>
                <td><a class="btn btn-default" role="button" href="{{route('role.edit',[$role])}}">修改</a><form method="post" action="{{route('role.destroy',[$role])}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@stop
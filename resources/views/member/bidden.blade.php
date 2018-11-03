@extends('layout.default')

@section('contents')
    @include('layout._notice')
    <table class="table table-hover">
        <tr>
            <th>用户ID</th>
            <th>用户名</th>
            <th>电话</th>
            <th>注册时间</th>
            <th>操作</th>
        </tr>
        @foreach($rows as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->username}}</td>
                <td>{{$row->tel}}</td>
                <td>{{$row->created_at}}</td>
                <td><a class="btn btn-default" href="{{route('member.forbidden',['id'=>$row->id,'status'=>0])}}" role="button">启用</a></td>
            </tr>
        @endforeach
    </table>

@stop
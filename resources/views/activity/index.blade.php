@extends('layout.default')

@section('contents')
    @include('layout._notice')

    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">活动时间<span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="{{route('activity.index',['status' => 1])}}">未结束</a></li>
            <li><a href="{{route('activity.index',['status' => 0])}}">进行中</a></li>
            <li><a href="{{route('activity.index',['status' => -1])}}">已结束</a></li>
            <li><a href="{{route('activity.index',['status' => 2])}}">全部</a></li>
        </ul>
    </div>

    <table class="table table-hover">
        <tr>
            <th>活动名称</th>
            <th>活动详情</th>
            <th>活动开始时间</th>
            <th>活动结束时间</th>
            <th>操作</th>
        </tr>
        @foreach($activitys as $activity)
            <tr>
                <td>{{$activity->title}}</td>
                <td><a href="{{route('activity.show',[$activity])}}" class="label label-success">查看活动详情</a></td>
                <td>{{$activity->start_time}}</td>
                <td>{{$activity->end_time}}</td>
                <td><a class="btn btn-default" href="{{route('activity.edit',[$activity])}}" role="button">修改</a> <form method="post" action="{{route('activity.destroy',[$activity])}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">删除</button>
                    </form> </td>
            </tr>
            @endforeach
    </table>
@stop
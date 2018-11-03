@extends('layout.default')

@section('contents')
    @include('layout._errors')
    <form action="{{route('activity.update',[$activity])}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">活动名称</label>
            <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="分类名称" value="{{$activity->title}}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">活动详情</label>
        @include('vendor.ueditor.assets')
        <!-- 实例化编辑器 -->
            <script type="text/javascript">
                var ue = UE.getEditor('container');
                ue.ready(function() {
                    ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                });
            </script>
            <!-- 编辑器容器 -->
            <script id="container" name="content" type="text/plain">{!! $activity->content !!}</script>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">活动开始时间</label>
            <input name="start_time" type="datetime-local" class="form-control" id="exampleInputEmail1" placeholder="活动开始时间" value="{{date('Y-m-d\TH:i:s',strtotime($activity->start_time))}}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">活动结束时间</label>
            <input name="end_time" type="datetime-local" class="form-control" id="exampleInputEmail1" placeholder="活动结束时间" value="{{date('Y-m-d\TH:i:s',strtotime($activity->end_time))}}">
        </div>
        {{csrf_field()}}
        {{method_field('PUT')}}
        <button type="submit" class="btn btn-default">修改</button>
    </form>
@stop
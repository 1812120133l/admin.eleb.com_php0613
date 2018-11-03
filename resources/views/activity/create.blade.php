@extends('layout.default')

@section('contents')
    @include('layout._errors')
    <form action="{{route('activity.store')}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">活动名称</label>
            <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="分类名称">
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
            <script id="container" name="content" type="text/plain"></script>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">活动开始时间</label>
            <input name="start_time" type="date" class="form-control" id="exampleInputEmail1" placeholder="活动开始时间">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">活动结束时间</label>
            <input name="end_time" type="date" class="form-control" id="exampleInputEmail1" placeholder="活动结束时间">
        </div>

        {{csrf_field()}}
        <button type="submit" class="btn btn-default">提交</button>
    </form>
@stop
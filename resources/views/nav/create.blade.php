@extends('layout.default')

@section('contents')
    <h1>添加菜单</h1>
    @include('layout._errors')
    <form action="{{route('nav.store')}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">菜单名称</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="菜单名称">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">上级分类</label>
            <select class="form-control" name="pid">
                <option value="0" selected>顶级分类</option>

                @foreach($navs as $nav)
                <option value="{{$nav->id}}">{{$nav->name}}</option>
                @endforeach

            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">地址/路由</label>
            <input name="url" type="text" class="form-control" id="exampleInputEmail1" placeholder="地址/路由">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">关联权限</label>
            <select class="form-control" name="permission_id">
                <option value="0" selected>所有</option>
                @foreach($permissions as $permission)
                <option value="{{$permission->id}}">{{$permission->name}}</option>
                @endforeach
            </select>
        </div>

        {{csrf_field()}}
        <button type="submit" class="btn btn-default">提交</button>
    </form>
@stop
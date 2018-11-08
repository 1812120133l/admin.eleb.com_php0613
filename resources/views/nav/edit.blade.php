@extends('layout.default')

@section('contents')
    <h1>修改导航</h1>
    @include('layout._errors')
    <form action="{{route('nav.update',[$nav])}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">导航名称</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="菜单名称" value="{{$nav->name}}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">上级分类</label>
            <select class="form-control" name="pid">
                <option value="0" selected>顶级分类</option>

                @foreach($ns as $n)
                    @if($n->id==$nav->pid)
                    <option value="{{$n->id}}" selected>{{$n->name}}</option>
                        @else
                        <option value="{{$n->id}}">{{$n->name}}</option>
                    @endif
                @endforeach

            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">地址/路由</label>
            <input name="url" type="text" class="form-control" id="exampleInputEmail1" placeholder="地址/路由" value="{{$nav->url}}" >
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">关联权限</label>
            <select class="form-control" name="permission_id">
                <option value="0" selected>所有</option>
                @foreach($permissions as $permission)
                    @if($permission->id==$nav->permission_id)
                        <option value="{{$permission->id}}" selected>{{$permission->name}}</option>
                        @else
                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                        @endif
                @endforeach
            </select>
        </div>

        {{csrf_field()}}
        {{method_field('PUT')}}
        <button type="submit" class="btn btn-default">提交</button>
    </form>
@stop
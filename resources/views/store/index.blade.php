@extends('layout.default')

@section('contents')
    @include('layout._notice')
    <table class="table table-hover">
        <tr>
            <th>商品分类名</th>
            <th>分类图片</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach($rows as $row)
        <tr>
            <td>{{$row->name}}</td>
            <td><img src="{{ $row->img }}" width="100px"></td>
            <td>@if($row->status==0)
                    隐藏
                    @else
                显示
                    @endif
            </td>
            <td><a class="btn btn-default" href="{{route('stopcategory.edit',[$row])}}" role="button">修改</a> <form method="post" action="{{ route('stopcategory.destroy',[$row]) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger">删除</button>
                </form> </td>

            </tr>
        @endforeach
    </table>
    {{ $rows->links() }}
@stop
@extends('layout.default')

@section('contents')
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <h1>添加权限</h1><br/><br/>
            @include('layout._errors')
            @include('layout._notice')
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 .col-md-offset-2">
            <form class="form-horizontal" action="{{route('power.append')}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">权限名</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="权限名">
                    </div>
                </div>
                {{csrf_field()}}
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">添加</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop
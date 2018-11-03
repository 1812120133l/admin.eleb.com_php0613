@extends('layout.default')

@section('contents')
    @include('layout._notice')

    <h1 class="text-center">{{$activity->title}}</h1>
    {!! $activity->content !!}
@stop
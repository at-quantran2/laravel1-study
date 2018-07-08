@extends('test-extends.master')
@section('title')
    Sub
@stop
@section('header')
    @parent
    Sub header
@stop

@section('content')
  Day la trang sub
@stop

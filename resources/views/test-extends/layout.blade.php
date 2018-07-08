@extends('test-extends.master')

@section('title')
    Layout
@stop
@section('header')
    Layout header
    @parent
@stop
@section('content')
    Noi dung trang layout
@stop
<h2></h2>
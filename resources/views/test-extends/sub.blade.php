@extends('test-extends.master')
@section('title')
    Sub
@stop
@include('test-extends.nhung', ['mar_content' => 'Sub marrquee'])
@section('header')
    @parent
    Sub header
@stop

@section('content')
    @for ($i = 0; $i < 10; $i++)
        Hello {{ $i }} <br>
    @endfor
    <hr>
    <?php $arr = ['one', 'two', 'three'] ?>
    @foreach ($arr as $ax)
        {{ $ax }} ,
    @endforeach
@stop

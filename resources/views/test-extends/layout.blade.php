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
    <?php
    $name = '<b>Tran Hong Quan</b>';
    $age = 16;
    ?>
    <br>
    {{$name}} 
    <br>
    {!!$name!!}
    <br>
    @if ($age  < 10)
        Diem < 10
    @elseif ($age < 15)
      10 < Diem < 15
    @else
        Diem >= 15
    @endif
    <br>
    {{ $nam1e or 'Error' }}
@stop
<h2></h2>
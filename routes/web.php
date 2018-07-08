<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/testroute', function() {
    echo 'View for testroute';
});
Route::get('/top', function() {
    echo 'View for testroute123';
});
Route::get('thongtin','Controller@showinfor') ;
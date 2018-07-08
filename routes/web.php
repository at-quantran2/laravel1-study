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
Route::get('courses/{sub}/{time}',function($subject, $time) {
    echo "This is Course $subject start at $time";
});
Route::get('courses/{sub?}',function($subject = 'default subject') {
    return " Course $subject";
});

Route::get('people/{name}/{age}',function($name, $age) {
    return "Hello $name is $age";
})->where(['name' => '[a-zA-Z]+', 'age' => '[0-9]{5}']);

Route::get('user/{id}', function ($id) {
    return "User $id";
})->where('id', '[0-9]+');

Route::get('user/{id}/{name}', function ($id, $name) {
    //
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
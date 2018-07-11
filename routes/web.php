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
})->where(['name' => '[a-zA-Z]+', 'age' => '[0-9]{1}']);

Route::get('user/{id}', function ($id) {
    return "User $id";
})->where('id', '[0-9]+');

//validate
Route::get('user/{id}/{name}', function ($id, $name) {
    //
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
Route::get('test', function() {
    $var = 'Tran Hong Quan';
    return view('test',compact('var'));
});

//Goi Controller
Route::get('testController', 'Controller@testAction');

//Goi Dinh danh => Dung trong form hay chuyen huong trang
Route::get('test-dinh-danh', ['as'=> 'thq', function() {
    return 'hello dinh danh';
}]);

//Group route
Route::group(['prefix' => 'category'], function() {
    Route::get('item1', function() {
        return 'Item1';
    }); 
    Route::get('item2', function() {
        return 'Item2';
    }); 
    Route::get('item3', function() {
        return 'Item3';
    }); 
});
Route::prefix('admin')->group(function () {
    Route::get('users1', function () {
        return 'user1';
    });
    Route::get('users2', function () {
        return 'user2';
    });
    Route::get('users3', function () {
        return 'user3';
    });
});
Route::get('test-view', function () {
    return view('test-view.view1');
});

//View share su dung cho nhieu title chung
View::share('title', 'My Laravel');

//Share cho view chi dinh
View::composer('test-view/view1', function ($view) {
    return $view->with('value', 'Hello123');
});

//Check view exists
Route::get('check-view', function () {
    echo view()->exists('test-view/view2');
});

//Test blade
Route::get('test-blade', function () {
    // return view('test-extends.master');
    return view('test-extends.sub');
    // return view('test-extends.sub');
});

//Get URL absolute
Route::get('url/full', function () {
    // return URL::full();
    return url()->full();
});

//Get Asset https
Route::get('url/1asset', function () {
    // return URL::full();
    return secure_asset('template/css/main.css');
});

//Truyen bien vao URL
Route::get('url/to', function () {
    echo 'top';

    // return route('people', ['quan', '8']);

});

//Schema Builder
Route::get('schema/create', function () {
    Schema::create('top', function ($table) {
        $table->increments('id');
        $table->string('course_name');
        $table->integer('const');
        $table->text('note')->nullable();
        $table->timestamps();
    });
});

//Rename Table
Route::get('schema/rename', function () {
    Schema::rename('top', 'thq');
});

//Drop table
Route::get('schema/drop', function () {
    Schema::dropIfExists('thq');
});

//Alt table
Route::get('schema/change-table', function () {
    Schema::table('top', function ($table) {
        // $table->string('course_name', 100)->change();
        $table->renameColumn('course_name', 'courseName');
    });
});

// Delete a column
Route::get('schema/del-col', function () {
    Schema::table('top', function ($table) {
        // $table->dropColumn('const');
        $table->dropColumn(['id', 'courseName']);
    });
});

// Create foreign key
Route::get('schema/create/cate', function () {
    Schema::create('category', function($table) {
        $table->increments('id');
        $table->string('name');
        $table->timestamps();
    });
});
// Create foreign key from product to category
Route::get('schema/create/product', function () {
    Schema::create('product', function($table) {
        $table->increments('id');
        $table->string('name');
        $table->integer('price');
        $table->integer('cate_id')->unsigned();
        $table->foreign('cate_id')->references('id')->on('category')->onDelete('cascade');
        $table->timestamps();
    });
});

//Query Builder Study
Route::get('query/select-all', function () {
    $data = DB::table('product')->get();
    echo '<pre>';
    print_r ($data);
    echo '</pre>';
});
Route::get('query/select-column', function () {
    $data = DB::table('product')->select('name')->where('id', 8)->get();
    echo '<pre>';
    print_r ($data);
    echo '</pre>';
});
Route::get('query/where-or', function () {
    $data = DB::table('product')
        ->where('cate_id', 100)
        ->orWhere('price', 4444400)
        ->get();
    echo '<pre>';
    print_r ($data);
    echo '</pre>';
});
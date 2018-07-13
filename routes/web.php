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

use App\Product;
use App\Images;
use App\Colors;
use App\Cars;


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
    Schema::create('cate_news', function($table) {
        $table->increments('id');
        $table->string('name');
        $table->timestamps();
    });
});
// Create foreign key from product to category
Route::get('schema/create/news', function () {
    Schema::create('news', function($table) {
        $table->increments('id');
        $table->string('title');
        $table->string('intro');
        $table->integer('cate_id')->unsigned();
        // $table->foreign('cate_id')->references('id')->on('category')->onDelete('cascade');
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
Route::get('query/order', function () {
    $data = DB::table('product')
        ->orderBy('price','DESC')
        ->get();
    echo '<pre>';
    print_r ($data);
    echo '</pre>';
});
Route::get('query/skip', function () {
    $data = DB::table('product')
        ->skip(2)
        ->take(3)
        ->get();
    echo '<pre>';
    print_r ($data);
    echo '</pre>';
});
Route::get('query/where-in', function () {
    $data = DB::table('product')
        ->whereIn('id', [2,4])
        ->get();
    echo '<pre>';
    print_r ($data);
    echo '</pre>';
});
Route::get('query/count', function () {
    $data = DB::table('product')->max('price');
    $data1 = DB::table('product')->where('price',$data)->take(1)->get();
    echo '<pre>';
    print_r ($data1);
    echo '</pre>';
});
Route::get('query/join', function () {
    $data = DB::table('news')
        ->join('cate_news', 'news.cate_id', '=', 'cate_news.id')
        ->select('news.*', 'cate_news.name')
        ->get();
    echo '<pre>';
    print_r ($data);
    echo '</pre>';
});
Route::get('query/insert', function () {
    DB::table('product')->insert([
        'name' => 'Quan Hong', 'price' => 3333, 'cate_id' => 2
    ]);
    return  'Success';
});
Route::get('query/insert-getId', function () {
    $id = DB::table('product')->insertGetId([
        'name' => 'Quan Bo Cam', 'price' => 77, 'cate_id' => 2
    ]);
    echo $id;
});
Route::get('query/update', function () {
    $id = DB::table('product')
    ->where('id', 15)
    -> update(['name' => 'Ao Gio']);
    return 'Success';
});
Route::get('query/delete', function () {
    $id = DB::table('product')
    ->where('id', 16)
    ->delete();
    return 'Success';
});

Route::get('model/select-all', function () {
    $data = Product::all()->tojSon();
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});
Route::get('model/selectId', function () {
    // $data = Product::find(20)->toArray();
    $data = Product::findOrFail(2110)->toArray();
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});
Route::get('model/where', function () {
    // $data = Product::find(20)->toArray();
    $data = Product::where('name', 'Quan Xanh')->toArray();
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});
Route::get('model/take', function () {
    $data = Product::where('id', '>', 10)
    ->take(5)
    ->get() 
    ->toArray();
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});
Route::get('model/count', function () {
    $data = Product::all()->count();
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});
Route::get('model/raw', function (Product $a) {
    $price = 2400;
    $data = $a::whereRaw('price < ? and id < ?', [$price, 10])
    ->get()
    ->tojSon();
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});

Route::get('model/insert', function () {
    $product = new Product;
    $product->name = 'Quan kaki';
    $product->price = 25000;
    $product->cate_id = 2;
    $product->save();
    return 'Insert Success!';
});
Route::get('model/create', function () {
    $data = ['name' => 'Ao Gach', 'price' => 2900, 'cate_id' => 1];
    
    Product::create($data);
    return 'Finished';
    
});
Route::get('model/update', function () {
    $product = Product::find(25);
    $product->price = 1;
    $product->save();
});
Route::get('model/delete', function () {
    Product::destroy(25);
    return 'Destroy finished';
});

//Eloquent relationship
Route::get('relation/one-many', function () {
    $images = Product::find(26)->images->toArray();
    echo '<pre>' ;
    print_r($images);
    echo '</pre>';
});
Route::get('relation/many-to-many', function () {
    // $car = Colors::find(1)->car()->get()->toArray();
    // $car = Cars::find(2)->color()->select('name')->get()->toArray();
    $car = Colors::find(2)->car()->select('name')->get()->toArray();
    echo '<pre>' ;
    print_r($car);
    echo '</pre>';
});

//Form Request

Route::view('form/layout', 'form.layout');
Route::post('form/layout', 'Top@show')->name('register');

//Response JSON, XML
Route::get('response/basic', function() {
    return 'basicx res';
});
Route::get('response/json', function() {
    $js = 
    [
        'id' => '1',
        'name' => 'quan',
        'age' => '20'
    ];
    return response()->json($js);
});
Route::get('response/xml', function() { 
    $content = '<?xml version="1.0" encoding="UTF-8" ?>
        <root>
            <top>Top</top>
            <list>
                <course>PHP</course>
                <course>C++</course>
            </list>
        </root>'; 
    $status = 200;
    $value = 'text/xml';
    return response($content, $status)->header('Content-Type', $value);
});

//Reponse redirect
Route::get('response/demo', function () {
    return view('test-view.test');
})->name('demo');
Route::get('response/redirect', function () {
    return redirect()->route('demo')->with(['name'=> 'Quasn']);
});
Route::get('response/redirect/back', function () {
    return redirect()->back();
});
Route::get('response/download', function () {
    $url = 'images/Screenshot from 2018-02-24 23-12-41.png';
    return  Storage::download($url);
});

//Test Macro Service Provider
Route::get('response/macro/cap', function () {
    return response()->cap('hello top');
    // return response()->max([3,1,5,6]);
});
Route::get('response/macro/contact', function () {
    return response()->contact('edit');
});

//Authentication
Route::get('authen/login', 'StudentController@getLogin' )->name('getLogin');
Route::post('authen/login', 'StudentController@postlogin' )->name('postLogin');


//chuyen huong khi URL khong co de cuoi cung
Route::any('{all?}', function() {
    return view('welcome');
})->where('all','(.*)');





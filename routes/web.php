<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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

//<<<=======Route======>>>>>
Route::get('/', function () {
    return view('welcome');
});

//Định tuyến có 1 tham số
Route::get('posts/{id}', function ($id) {
    return $id;
});

//Định tuyến có 2 tham số
Route::get('posts/{cat_id}/page/{page}', function ($cat_id, $page) {
    return $cat_id . " " . $page;
});

//Đặt tên định tuyến
Route::get('user/profile', function () {
    return route('profile');
})->name('profile');


//Định tuyến tham số tùy chọn Yes/No
Route::get('product/{id?}', function ($id = 0) {
    if ($id == 0) {
        return "Đây là trang danh sách sản phẩm";
    } else {
        return "Chi tiết sản phẩm" . " " . "$id";
    }
});

//Định tuyến với tham số có ràng buộc biểu thức chính quy
// Route::get('blogs/{id}', function ($id) {
//     return $id;
// })->where('id', '[0-9]+');
Route::get('blogs/{slug}/{id}', function ($slug, $id) {
    return $slug . "---" . $id;
})->where(['slug' => '[A-Za-z0-9-_]+']);

//Định tuyến đến một view
Route::view('/post', 'post', ['id' => 20]);

//Định tuyến đến một controller
Route::get('/post/{id}', 'Postcontroller@detail');


//<<<=======Controller======>>>>>
Route::get('products/{id}', 'Productcontroller@show');
Route::get('update/{id}', 'Productcontroller@update');

// Route::resource('posts', 'PostController');
Route::get('admin/post/show', 'AdminPostController@show');
Route::get('admin/post/add', 'AdminPostController@add');
Route::get('admin/post/update/{id}', 'AdminPostController@update');
Route::get('admin/post/delete/{id}', 'AdminPostController@delete');


Route::get('child/{id}', function ($id) {
    $users = array(
        1 => array(
            'fullname' => 'Trần Quang Quý',
            'age' => 20,
            'address' => 'Hà Nội'
        ),
        2 => array(
            'fullname' => 'Ngọ Văn Thi',
            'age' => 28,
            'address' => 'Đà Năng'
        ),
        3 => array(
            'fullname' => 'Đăng Văn Tùng',
            'age' => 22,
            'address' => 'Hai Bà Trưng'
        )
    );
    return view('child', compact('users'));
});



//Thêm dữ liệu vào database ngay trên route
Route::get('users/insert', function () {
    DB::table('tbl_users')->insert(
        [
            ['name' => "Maicute2003", 'email' => 'tranquy52003@gmail.com', 'password' => bcrypt('Hieu1976')],
            ['name' => "Huycute2003", 'email' => 'tranquy52003@gmail.com', 'password' => bcrypt('Hieu1976')],
        ]
    );
});

//Thêm dữ liệu vào database qua controller(insert)
Route::get('posts/insert', 'PostController@add');

//Lấy dữ liệu từ database(get)
Route::get('posts/show', 'PostController@show');

<?php

use Illuminate\Support\Facades\Route;

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

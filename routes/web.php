<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Post;
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
Route::get('users/add', function () {
    DB::table('tbl_users')->insert(
        [
            ['name' => "Thicute2003", 'email' => 'tranquy52003@gmail.com', 'password' => bcrypt('Hieu1976')],
            ['name' => "Huycute2003", 'email' => 'tranquy52003@gmail.com', 'password' => bcrypt('Hieu1976')],
            ['name' => "Cuongcute2003", 'email' => 'tranquy52003@gmail.com', 'password' => bcrypt('Hieu1976')],
            ['name' => "Huancute2003", 'email' => 'tranquy52003@gmail.com', 'password' => bcrypt('Hieu1976')],
        ]
    );
});

//Thêm dữ liệu vào database qua controller(insert)
Route::get('posts/add', 'PostController@add');

//Lấy dữ liệu từ database(get)
Route::get('posts/show', 'PostController@show');

//Cập nhật dữ liệu
Route::get('posts/update/{id}', 'PostController@update');

//Xóa dữ liệu
Route::get('posts/delete/{id}', 'PostController@delete');

Route::get('admin/products/add', 'AdminProductController@add');
Route::get('admin/products/update/{id}', 'AdminProductController@update');
Route::get('admin/products/delete/{id}', 'AdminProductController@delete');
Route::get('admin/products/show', 'AdminProductController@show')->name('admin.products.show');


//================Eloquent ORM=========================

#Lấy tất cả
// Route::get('posts/show', function () {
//     $posts = Post::all('post_name');
//     dd($posts);
// });

#Lấy theo điều kiện
// Route::get('posts/show', function () {
//     $posts = Post::where('id', '>', '1')->select('post_name', 'creator')
//         ->get();
//     // dd($posts);
//     return $posts;
// });

#Lấy nội dung theo ID
// Route::get('posts/show', function () {
//     $posts = Post::find([1, 2]);
//     dd($posts);
//     return ($posts->post_name);
// });

#Lấy nội dung theo OrderBY
// Route::get('posts/show', function () {
//     $posts = Post::orderBy('id', 'desc')
//         ->get();
//     dd($posts);
// });

#Group by lấy dữ liệu theo nhóm
// $posts = Post::selectRaw("COUNT('post_id') as number_post,creator")
//     ->groupBy('creator')
//     ->get();
// dd($posts);

#Lấy limit dữ liệu 
// $posts = Post::offset(2)
//     ->limit(3)
//     ->get();
// dd($posts);

#Thêm dữ liệu vào database bằng pT save
// $post = new Post;
// $post->post_name = 'Laravel Pro';
// $post->creator = 1;

// $post->save();

Route::get('posts/restore/{id}', 'PostController@restore');
Route::get('posts/permanentlydelete/{id}', 'PostController@permanentlyDelete');

Route::get('users/show', 'UserController@show');
Route::get('roles/show', 'RoleController@show');

Route::get('admin/posts/add', function () {
    return view('admin.post.add');
});
Route::post('admin/posts/store', 'AdminPostController@store');
Route::get('admin/products/add', function () {
    return view('admin.product.add');
});
Route::post('admin/products/store', 'AdminProductController@store');
Route::get('helper/', 'HelperController@string');


Route::get('session/add', 'SessionController@add');
Route::get('session/show', 'SessionController@show');
Route::get('session/add_flash', 'SessionController@add_flash');
Route::get('session/delete', 'SessionController@delete');

Route::get('cookie/set', 'CookieController@set');
Route::get('cookie/get', 'CookieController@get');

Route::get('demo/sendmail', 'DemoController@sendmail');

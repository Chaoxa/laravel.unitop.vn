<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    function add()
    {
        DB::table('tbl_posts')->insert(
            [
                ['creator' => 1, 'post_name' => "Tại sao bạn cần phải học"],
                ['creator' => 2, 'post_name' => "Tiếng anh quan trọng như nào?"],
                ['creator' => 3, 'post_name' => "Cách bắn bi a hay"],
            ]
        );
    }

    function show()
    {
        //Lấy tất cả bản ghi
        // return $posts = DB::table('tbl_users')->get();

        //Lấy 1 bản ghi
        // $posts = DB::table('tbl_users')->select('name', 'email')->first();

        //Lấy bản ghi có điều kiện
        // return $posts = DB::table('tbl_users')->where('id', 2)->get('name');

        //Lấy bản ghi có id cho trước 
        // $posts = DB::table('tbl_users')->find(1);
        // return $posts->name;

        //Đếm số lượng bản ghi
        // return $posts = DB::table('tbl_users')->where('id', 1)->count();

        //Phương thức phục vụ thống kê
        // return DB::table('tbl_users')->max('id');
        // return DB::table('tbl_users')->min('id');
        // return DB::table('tbl_users')->avg('id');

        //Cách join bảng
        // $posts = DB::table('tbl_posts')->join('tbl_users', 'tbl_posts.creator', '=', 'tbl_users.id')
        //     ->select('tbl_posts.post_name', 'tbl_users.name')
        //     ->get();
        // dd($posts);

        //Lấy dữ liệu bảng theo điều kiện
        $posts = DB::table('tbl_posts')
            // ->where('id', '<', 3)
            ->where('post_name', 'Like', '%bi%')
            ->get();
        dd($posts);
    }
}

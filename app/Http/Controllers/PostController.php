<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    function add()
    {
        // DB::table('tbl_posts')->insert(
        //     [
        //         ['creator' => 1, 'post_name' => "Tại sao bạn cần phải học"],
        //         ['creator' => 2, 'post_name' => "Tiếng anh quan trọng như nào?"],
        //         ['creator' => 3, 'post_name' => "Sách 10 vạn câu hỏi vì sao"],
        //         ['creator' => 4, 'post_name' => "Sách giáo dục trẻ nhỏ"],
        //     ]
        // );


        // $post = new Post;
        // $post->post_name = 'Laravel Pro';
        // $post->creator = 1;
        // $post->save();


        //Sử dụng xuyên suốt
        Post::create([
            'post_name' => 'PHP Master',
            'creator' => 2,
        ]);
    }

    function show()
    {
        #Lấy tất cả bản ghi
        // return $posts = DB::table('tbl_users')->get();

        #Lấy 1 bản ghi
        // $posts = DB::table('tbl_users')->select('name', 'email')->first();

        #Lấy bản ghi có điều kiện
        // return $posts = DB::table('tbl_users')->where('id', 2)->get('name');

        #Lấy bản ghi có id cho trước 
        // $posts = DB::table('tbl_users')->find(1);
        // return $posts->name;

        #Đếm số lượng bản ghi
        // return $posts = DB::table('tbl_users')->where('id', 1)->count();

        #Phương thức phục vụ thống kê
        // return DB::table('tbl_users')->max('id');
        // return DB::table('tbl_users')->min('id');
        // return DB::table('tbl_users')->avg('id');

        #Cách join bảng
        // $posts = DB::table('tbl_posts')->join('tbl_users', 'tbl_posts.creator', '=', 'tbl_users.id')
        //     ->select('tbl_posts.post_name', 'tbl_users.name')
        //     ->get();
        // dd($posts);

        #Lấy dữ liệu bảng theo điều kiện
        // $posts = DB::table('tbl_posts')
        //     // ->where('id', '<', 3)
        //     ->where('post_name', 'Like', '%bi%')
        //     ->get();
        // dd($posts);

        #Thiết lập điều kiện kết hợp
        // $posts = DB::table('tbl_posts')
        //     ->where([
        //         ['post_name', 'Like', '%bi%'],
        //         ['id', '>', 1]
        //     ])
        //     ->get();
        // dd($posts);

        # $posts = DB::table('tbl_posts')
        //     ->where('post_name', 'Like', '%bi%')
        //     ->orWhere('id', '1')
        //     ->get();
        // dd($posts);

        #Group by lấy dữ liệu theo nhóm
        // $posts = DB::table('tbl_posts')
        //     ->selectRaw("COUNT('post_id') as number_post,creator")
        //     ->groupBy('creator')
        //     ->get();
        // dd($posts);

        #Order by sắp xếp dữ liệu trong thống kê
        // $posts = DB::table('tbl_posts')
        //     ->orderBy('id')
        //     ->get();
        // dd($posts);

        #Lấy số bản ghi theo giới hạn
        $posts = DB::table('tbl_posts')
            ->offset(3)
            ->limit(3)
            ->get();
        dd($posts);
    }

    function update($id)
    {
        // DB::table('tbl_posts')
        //     ->where('id', $id)
        //     ->update(
        //         [
        //             'post_name' => 'Cách bắn bi hay',
        //         ]
        //     );

        // $post = Post::find($id);
        // $post->post_name = 'Laravel Pro 2023';
        // $post->creator = 1;
        // $post->save();


        //Sử dụng xuyên suốt
        $post = Post::find($id)
            ->update([
                'post_name' => 'Trần Quang Quý',
                'creator' => '3'
            ]);
    }



    function delete($id)
    {
        return  DB::table('tbl_posts')
            ->where('id', $id)
            ->delete();
    }
}

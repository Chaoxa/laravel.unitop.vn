<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class AdminPostController extends Controller
{
    //
    function show()
    {
        $posts = Post::all();
        return view('admin.post.show', compact('posts'));
    }
    function add()
    {
        return view('admin.post.add');
    }
    function update($id)
    {
        return view('admin.post.update', compact('id'));
    }
    function delete($id)
    {
        return "Cập nhật bài viết có id:$id";
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'desc' => 'required'
            ],
            [
                'required' => ':attribute không được để trống!'
            ],
            [
                'title' => 'Tên bài viết ',
                'desc' => 'Mô tả bài viết'
            ]
        );
        $input = $request->input();
        $input['creator'] =  1;
        Post::create($input);
        return redirect('admin/posts/show')->with('status', 'Đã thêm bài viết thành công!');
        // return $request->input();
    }
}

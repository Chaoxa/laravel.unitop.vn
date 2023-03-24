<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    //
    function show()
    {
        return view('admin.product.show');
    }
    function add()
    {
        return "Thêm bài viết";
    }
    function update($id)
    {
        return "Cập nhật bài viết có id:$id";
    }
    function delete($id)
    {
        return "Cập nhật bài viết có id:$id";
    }
}

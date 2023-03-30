<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function show($id)
    {
        $colors = array('red', 'yellow');
        return view('product.show', compact('id', 'colors'));
    }
    function update($id)
    {
        // Chuyển hướng đến một route.
        // return redirect('posts');
        return redirect('posts/index');
    }
}

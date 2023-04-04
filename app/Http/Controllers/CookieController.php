<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    //
    function set(Request $request)
    {
        $response = new Response();
        return $response->cookie('unitop', 'Học web đi làm', 24 * 60);
        return redirect('cookie/get');
    }
    function get(Request $request)
    {
        return $request->cookie('unitop');
    }
}

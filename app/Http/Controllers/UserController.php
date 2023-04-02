<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    function show()
    {
        $post =  User::find(1)
            ->post()
            ->get();
        dd($post);
        // return $post;
    }
}

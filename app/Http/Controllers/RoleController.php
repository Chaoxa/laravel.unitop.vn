<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    //
    function show()
    {
        $list_users = Role::find(1)
            ->users()
            ->get();
        dd($list_users);
    }
}

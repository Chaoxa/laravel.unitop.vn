<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminProductController extends Controller
{
    function add()
    {
        DB::table('tbl_products')
            ->insert([
                ['name_product' => 'Macbook M1', 'price' => '25000000', 'product_cat_parent' => 1, 'creator' => 1],
                ['name_product' => 'IPhone XS', 'price' => '15000000', 'product_cat_parent' => 2, 'creator' => 2],
                ['name_product' => 'Macbook M2', 'price' => '25000000', 'product_cat_parent' => 1, 'creator' => 4],
                ['name_product' => 'IPhone 12 Pro', 'price' => '25000000', 'product_cat_parent' => 1, 'creator' => 1],
            ]);
    }

    function update($id)
    {
        DB::table('tbl_products')
            ->where('id', $id)
            ->update([
                'price' => '9000000', 'name_product' => 'OPPO A92',
            ]);
    }

    function delete($id)
    {
        DB::table('tbl_products')
            ->where('id', $id)
            ->delete();
    }

    function show()
    {
        $products =  DB::table('tbl_products')
            ->join('tbl_users', 'tbl_users.id', '=', 'tbl_products.creator')
            ->select('name_product', 'price', 'name')
            ->get();
        dd($products);
    }
}

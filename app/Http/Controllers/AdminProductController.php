<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;


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
        $products = Product::join('tbl_users', 'tbl_products.creator', '=', 'tbl_users.id')
            ->select('name_product', 'name', 'thumb_main', 'price', 'tbl_products.id')
            ->where('tbl_products.id', '>', '0')
            ->paginate(8);
        #Thay đổi đường path
        // ->withPath('demo/show');
        // ->simplePaginate(4);
        // dd($products);

        return view('admin.product.show', compact('products'));
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'name_product' => 'required',
            ],
            [
                'required' => ':attribute không được để trống!'
            ],
            [
                'name_product' => 'Tên sản phẩm'
            ]
        );
        $input = $request->all();
        // return dd($input);
        if ($request->hasFile('file')) {
            $file = $request->file;
            //Lấy tên file
            $fileName = $file->getClientOriginalName();
            //Lấy đuôi file
            $file->getClientOriginalExtension();
            //Lấy kích thước file
            $file->getSize();

            $path = $file->move('public/uploads', $file->getClientOriginalName());
        }
        $input['thumb_main'] = "public/uploads/" . $fileName;
        $input['product_cat_parent'] = 2;
        $input['creator'] = 3;

        Product::create($input);
        #Chuyển hướng đến một url
        return redirect('admin/products/show');
        #Chuyển hướng kèm thông báo
        // return redirect('admin/products/show')->with('status', 'Thêm sản phẩm thành công');
        #Chuyển hướng đến một trang ngoài hệ thống
        // return redirect()->away('https://www.facebook.com/');
    }
}

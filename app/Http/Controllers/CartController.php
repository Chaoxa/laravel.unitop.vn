<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    function show()
    {
        return view('cart.show');
    }
    function add($id)
    {
        $product = Product::find($id);
        // return dd(Product::find($id)->toArray());
        Cart::add([
            'id' => $id,
            'name' => $product->name_product,
            'qty' => 1,
            'price' => $product->price,
            'options' => ['thumb_main' => $product->thumb_main]
        ]);
        // return dd(Cart::content());
        return redirect('cart/show');
    }
    function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect('cart/show');
    }
    function destroy()
    {
        Cart::destroy();
        return redirect('cart/show');
    }
    function update(Request $request)
    {
        // dd($request->all());
        $data = $request->get('qty');
        // dd($data);
        foreach ($data as $k => $v) {
            Cart::update($k, $v);
        }
        return redirect('cart/show');
    }


    public function update_ajax(Request $request)
    {
        $id = $request->id;
        $qty = $request->qty;
        Cart::update($id, $qty);
        $sub_total =  Cart::get($id)->subtotal();
        $total =  Cart::total();
        return response()->json([
            'id' => $id,
            'sub_total' => $sub_total . 'đ',
            'total' => $total . 'đ'
        ]);
    }
}

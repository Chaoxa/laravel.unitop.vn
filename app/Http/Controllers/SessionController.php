<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    function add(Request $request)
    {
        // $request->session()->put('username', 'Quycute2003');

        #Lưu session bằng helper
        session(['username' => 'Quycute2003', 'password' => '12345678']);
    }
    function show(Request $request)
    {
        #Lấy ra tất cả các session
        // return $request->session()->all();
        #Lấy ra một trường trong session
        // return $request->session()->get('username');
        #Kiểm tra sự tồn tại của session
        // echo $request->session()->has('username');
        #Flash session
        // $request -> session() -> flash('status', 'Bạn đã thêm sản phẩm thành công!');
        #Xóa session
        // $request->session()->forget('username');
        // $request->session()->flush();
        // return $request->session()->get('status');
        #Hiển thị session bằng helper
        return session('username');
    }

    function add_flash(Request $request)
    {
        $request->session()->flash('status', 'Bạn đã thêm sản phẩm thành công!');
        return redirect('session/show');
    }

    function delete(Request $request)
    {
        $request->session()->forget('username');
        return redirect('session/show');
    }
}

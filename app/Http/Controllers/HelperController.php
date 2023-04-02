<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HelperController extends Controller
{
    function url()
    {
        //Lấy url từ một action
        $url = action('AdminProductController@store');
        //Lấy url hiện tại 
        $url = url()->current();
        echo $url;
    }

    function string()
    {
        #1.Lấy độ dài chuỗi
        $str_1 = "Trần Quang Quý";
        // echo Str::length($str_1);

        #2.In thường in hoa một chuỗi
        // echo Str::upper($str_1);
        // echo Str::lower($str_1);

        #3.Tạo chuỗi ngẫu nhiên;
        // echo Str::random(20);

        #4.Loại bỏ kí tự dư thừa
        // echo Str::of(' Trần  Quang    Quý')->trim();

        #5.Tạo link thân thiện;
        // echo Str::slug('Chi tiết sản phẩm có id là 60');

        #6.Lấy chuỗi con --> 'Trần'
        // echo Str::of($str_1)->substr(0, 4);

        #7.Tìm kiếm và thay thế chuỗi
        // echo Str::of($str_1)->replace('Quý', 'Kiên');

        #8.Cắt chuỗi với một kí tự cho trước --> 'Trần Qua....'
        // echo Str::of($str_1)->limit(10);

        #9.Kiểm tra chuỗi cha chứa chuỗi con
        echo Str::contains($str_1, 'Quý');
    }
}

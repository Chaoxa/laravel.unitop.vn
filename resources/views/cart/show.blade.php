@extends('layouts.app')

@section('content')
<div id="wp-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Giỏ hàng</h1>
                <p class="text-success">Hiện tại có ({{Cart::count()}}) trong giỏ hàng.</p>
                <form action="{{url('cart/update')}}" method="post">
                    @csrf
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $temp = 0;
                            @endphp
                            @foreach (Cart::content() as $product)
                            @php
                            $temp++;
                            @endphp
                            <tr>
                                <td scope="row">{{$temp}}</td>
                                <td>
                                    <img src="{{asset($product -> options -> thumb_main)}}" width="50px" alt="">
                                </td>
                                <td scope="col"><a href="">{{$product -> name}}</a></td>
                                <td scope="col">{{number_format($product -> price,'0','','.')}}đ</td>
                                <td scope="col">
                                    <input type="number" name="qty[{{$product -> rowId}}]" min="1"
                                        style="width:50px; text-align: center" value="{{$product -> qty}}">
                                </td>
                                <td scope="col">{{number_format($product -> total,'0','','.')}}đ</td>
                                <td><a href="{{url('cart/remove/'.$product -> rowId)}}" class="text-danger">Xóa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan='6' class="text-right">Tổng:</td>
                                <td><strong>{{Cart::total()}} VNĐ</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                    <a href="{{url('cart/destroy')}}">Xóa giỏ hàng</a>
                    <input type="submit" name="btn-update" value="Cập nhật giỏ hàng" class="btn btn-outline-success">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end wp-content -->
@endsection
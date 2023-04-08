@extends('layouts.app')

@section('content')
<div id="wp-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Shop</h1>
                <div class="list-product mt-3">
                    @if (session('status'))
                    <div class="alert-success alert">
                        {{session('status')}}
                    </div>
                    @endif
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-md-3 col-sm-4 col-6 mb-3">
                            <div class="product-item border py-2">
                                <div class="product-thumb">
                                    <a href="">
                                        <img class="img-fluid" src="{{asset($product->thumb_main)}}" alt="">
                                    </a>
                                </div>
                                <div class="product-info p-2 text-center">
                                    <a class="product-title" href="">{{$product->name_product}}</a>
                                    <div class="price-box">
                                        <span class="current-price text-danger">{{number_format($product->price, 0,
                                            "",".").'đ'}}</span>
                                    </div>
                                    <a href="{{ url('/cart/add/'.$product->id) }}"
                                        class="btn btn-outline-success btn-sm mt-3" class="add-to-cart">Thêm sản
                                        phẩm</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{-- Tạo hiển thị thanh phân trang có điều kiện --}}
        <b class="py-2"> {{$products ->appends(['sort' => 'votes','price' => '100']) ->links()}}</b>
    </div>
</div>
<!-- end wp-content -->
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Hiển thị danh sách sản phẩm</h1>
    @if (session('status'))
    <div class="alert-success alert">
        {{session('status')}}
    </div>
    @endif
    @foreach ($products as $product)
    <li>
        <img src="{{asset($product -> thumb_main)}}" alt="lỗi" width="50" height="50">
        <a href="">{{$product -> name_product}}</a>
        <a href="">{{$product -> name}}</a>
    </li>
    @endforeach
</div>
@endsection
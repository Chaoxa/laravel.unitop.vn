@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Hiển thị danh sách sản phẩm</h1>
    @if (session('status'))
    <div class="alert-success alert">
        <b>{{session('status')}}</b>
    </div>
    @endif
    @foreach ($posts as $post)
    <ul>
        <li>
            <b> {{$post -> title}}</b>
            {!!$post -> desc!!}
        </li>
    </ul>
    @endforeach
</div>
@endsection
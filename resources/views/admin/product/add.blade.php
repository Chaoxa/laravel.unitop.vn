@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thêm sản phẩm</h1>
    {!! Form::open(['url'=>'admin/products/store','method' => 'POST','id' => 'form-reg','files' => true]) !!}
    <div class="form-group">
        {!! Form::label('name_product', 'Tên sản phẩm', []) !!}
        {!! Form::text('name_product', '', ['class' => 'form-control','id' => 'name_product']) !!}
        @error('name')
        <small class="text-danger">{{$message}}</small>
        @enderror
        <span class="form-message"></span>
    </div>
    <div class="form-group">
        {!! Form::file('file', []) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Thêm', ['class' => 'btn btn-success','name' => 'btn-add']) !!}
    </div>
    {!! Form::close() !!}
</div>
@endsection
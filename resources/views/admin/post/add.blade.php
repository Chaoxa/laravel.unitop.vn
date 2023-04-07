@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thêm bài viết</h1>
    {!! Form::open(['url'=>'admin/posts/store','method' => 'POST','id' => 'form-reg','files' => true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Tên bài viết', []) !!}
        {!! Form::text('title', '', ['class' => 'form-control','id' => 'title']) !!}
        @error('title')
        <small class="text-danger">{{$message}}</small>
        @enderror
        <span class="form-message"></span>
    </div>
    <div class="form-group">
        {!! Form::label('', 'Mô tả sản phẩm', []) !!}
        {!! Form::textarea('desc', '', ['class' => 'form-control my-editor']) !!}
        @error('desc')
        <small class="text-danger">{{$message}}</small>
        @enderror
        <span class="form-message"></span>
    </div>
    {{-- <div class="form-group">
        {!! Form::label('password', 'Mật khẩu', []) !!}
        {!! Form::password('password', ['class' => 'form-control','id' => 'password']) !!}
        <span class="form-message"></span>
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email', []) !!}
        {!! Form::email('email', '', ['class' => 'form-control','id' => 'email']) !!}
        <span class="form-message"></span>
    </div>
    <div class="form-group">
        {!! Form::label('address', 'Địa chỉ', []) !!}
        {!! Form::select('address', [1=>'Hà Nội',2=>'TP.HCM',3=>'Đà Nẵng'], 2, []) !!}
    </div>
    <div class="form-group">
        {!! Form::label('gender', 'Giới tính', []) !!}
        <div class="form-check">
            {!! Form::radio('gender', 'Nam', '', ['class' => 'form-check-input','id' => 'male']) !!}
            {!! Form::label('male', 'Nam', []) !!}
        </div>
        <div class="form-check">
            {!! Form::radio('gender', 'Nữ', 'checked', ['class' => 'form-check-input','id' => 'female']) !!}
            {!! Form::label('female', 'Nữ', []) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('skill', 'Kĩ năng', []) !!}
        <div class="form-check">
            {!! Form::checkbox('skill', 'HTML', '', ['class' => 'form-check-input','id' => 'HTML']) !!}
            {!! Form::label('HTML', 'HTML', []) !!}
        </div>
        <div class="form-check">
            {!! Form::checkbox('skill', 'JavaScript', '', ['class' => 'form-check-input','id' => 'JavaScript']) !!}
            {!! Form::label('JavaScript', 'JavaScript', []) !!}
        </div>
        <div class="form-check">
            {!! Form::checkbox('skill', 'PHP', '', ['class' => 'form-check-input','id' => 'PHP']) !!}
            {!! Form::label('PHP', 'PHP', []) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::file('file', []) !!}
    </div>
    <div class="form-group">
        {!! Form::label('', 'Ngày sinh', ['class' => 'form-control-file']) !!}
        {!! Form::date('birth', '', ['class' => 'form-control']) !!}
    </div> --}}
    <div class="form-group">
        {!! Form::submit('Thêm', ['class' => 'btn btn-success','name' => 'btn-add']) !!}
    </div>
    {!! Form::close() !!}
</div>
@endsection
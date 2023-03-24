@extends('layouts.app')
@section('title','Tiêu đề trang con')

@section('content')
<p>Nội dung trang con</p>
<p>Họ và tên:{!!$data!!}</p>
@endsection

@section('sidebar')
<p>Sidebar trang con</p>
@endsection
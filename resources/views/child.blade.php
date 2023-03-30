@extends('layouts.app')
@section('title','Tiêu đề trang con')
@include('inc.comment',['title'=>'Trần Quý'])
@section('content')
<p>Nội dung trang con</p>
{{-- @if ($data % 2 ==0)
<p>{{$data}}: Là số chẵn</p>
@else
<p>{{$data}}: Là số lẻ</p>
@endif --}}

{{-- @for($i = 0;$i < $data;$i++) <b>Giá trị:{{$i}}</b>@endfor --}}

    @foreach ($users as $user)
    <p>{{$user['fullname']}}</p>
    @endforeach
    @endsection

    @section('sidebar')
    <p>Sidebar trang con</p>
    @endsection
@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
           <ol class="breadcrumb">
                <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
                <li><a href="{{route('admin.get.list.page_static')}}" title="Danh sach">Trang page</a></li> 
                <li class="active">Cập nhật</li>   
            </ol>
    </div>
    <div class="">
     {{-- goi view tu form.blade.php --}}
        @include('admin::page_static.form')
    </div>  
@stop
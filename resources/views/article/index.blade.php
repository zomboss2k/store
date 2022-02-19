@extends('layouts.app')
@section('content')

<style>
    .main-contact-area {
        margin-top: 20px;
    }

</style>

<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inner">
                    <ul>
                        <li class="home">
                            <a href="{{route('home')}}">Trang chủ</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="home">
                            <a href="{{route('get.list.article')}}">Bài viết</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>Danh sách bài viết</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-contact-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
               {{-- show bài viết --}}
                @include('components.article') 
            </div>
            <div class="col-sm-3">
                <h5>Bài viết nổi bật</h5>
                <div class="list_article_hot">
                    @include('components.article_hot')
                </div>
            </div>
        </div>
    </div>	
</div>

@stop
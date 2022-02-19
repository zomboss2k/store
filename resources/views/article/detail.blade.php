@extends('layouts.app')
@section('content')
<style>
    .article_content h2 {font-size: 1.4 rem;}
    .article_content h1 {font-size: 18px !important;line-height: 24px;}
    .article_content {font-family: Roboto,sans-serif;}
    .main-contact-area{ margin-top: 20px;}
    
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
                            <a href="{{route('get.list.article')}}" title="Bài viết">Bài viết</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span> {{$articleDetail->a_name}}</span></li>
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
                <div class="article_content" style="margin-bottom: 20px;">
                    {{-- <h1><i class="fa fa-chevron-right" aria-hidden="true"></i> {{$articleDetail->a_name}}</h1> --}}
                    <p style="font-weight: 500; color: darkcyan;"><i class="fa fa-calendar" aria-hidden="true"></i> {{$articleDetail->created_at}}</p>
                    {{-- <img src="{{pare_url_file($articleDetail->a_avatar_seo)}}" alt=""> --}}
                    {{-- <p style="font-weight: 500; color: darkcyan;">{{$articleDetail->a_description}}</p> --}}
                    <div>
                        {{-- html --}}
                        {!!$articleDetail->a_content!!}
                    </div>
                </div>
                <h4>Bài viết khác</h4>
                @include('components.article')
            </div>
            <div class="col-sm-3">
                <h4>Bài viết nổi bật</h4>
                <div class="list_article_hot">
                    @include('components.article_hot')
                </div>
            </div>
        </div>
    </div>	
</div>

@stop
@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
           <ol class="breadcrumb">
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Bài viết</a></li>
                <li class="active">Danh sách</li>   
            </ol>
    </div>
    {{-- Form tim  bai viet --}}
     <div class="row">
         <div class="col-sm-12">
                <form class="form-inline" action="" style="margin-bottom: 20px">
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Tên bài viết ..." name="name" value="{{\Request::get('name')}}">
                    </div>
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </form>
         </div>
     </div>

    <div class="table-responsive">
            <h2 class="page-header">Quản lý bài viết <a href="{{route('admin.get.create.article')}}"class="pull-right"><i class="fas fa-plus-circle"></i></a></h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="width: 20%">Tiêu đề bài viết</th>
                        <th style="width: 100px">Hình ảnh</th>
                        <th style="width: 300px">Mô tả</th>
                        <th>Nổi bật</th>
                        <th>Trang chủ</th>
                        <th>Ngày tạo</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                         {{-- kiểm tra --}}
                    <?php $stt = 1 ?>
                    @if (isset($articles))
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{$stt}}</td>
                                <td>
                                    {{$article->a_name}}
                                </td>
                                {{-- hien thi  hình anh bài viết  --}}
                                <td>
                                    <img src="{{pare_url_file($article->a_avatar_seo)}}" alt="" class="img img-responsive" style="width: 100px; height: 80px">
                                </td>

                                <td>{{$article->a_description}}</td>
                                
                                <td>
                                    {{-- Thay đổi bài viết nổi bật getHot --}}
                                    <a href="{{route('admin.get.action.article',['hot',$article->id])}}" class="label {{$article->getHot($article->c_hot)['class']}}">{{$article->getHot($article->c_hot)['name']}}</a> 
                                </td>
                                <td>
                                    {{-- Thay đổi trạng thái getSatus --}}
                                    {{-- {{ dd($article->a_active)}} --}}
                                    <a href="{{route('admin.get.action.article',['active',$article->id])}}" class="label {{$article->getStatus($article->a_active)['class']}}">{{$article->getStatus($article->a_active)['name']}}</a>
                                </td>
                                <td>
                                     {{-- ngày tạo --}}
                                    {{$article->created_at->format('d-m-Y')}}
                                </td>
                                <td>
                                    {{-- sua, xoa bai viet --}}
                                <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px" href="{{route('admin.get.edit.article',$article->id)}}"><i class="fas fa-edit"></i></a>
                                <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px" href="{{route('admin.get.action.article',['delete',$article->id])}}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>        
                            <?php $stt++ ?>
                           @endforeach

                    @endif
                </tbody>
            </table>
            {{-- Phân trang --}}
            {!! $articles->links()!!}
    </div>
@stop
@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
           <ol class="breadcrumb">
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Danh mục trang</a></li>
                <li class="active">Danh sách</li>   
            </ol>
    </div>
    {{-- Form tim kiếm --}}
     {{-- <div class="row">
         <div class="col-sm-12">
                <form class="form-inline" action="" style="margin-bottom: 20px">
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Tên bài viết ..." name="name" value="{{\Request::get('name')}}">
                    </div>
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </form>
         </div>
     </div> --}}

    <div class="table-responsive">
            <h2>Quản lý trang<a href="{{route('admin.get.create.page_static')}}" class="pull-right"><i class="fas fa-plus-circle"></i></a></h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề trang</th>       
                        <th>Mục thông tin</th>
                        
                        <th>Cập nhật</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- kiểm tra --}}
                    <?php $stt =1 ?>
                    @if (isset($pages))
                        @foreach ($pages as $page)
                            <tr>
                                <td>{{$stt}}</td>
                                <td>{{$page->ps_name}}</td>  
                                <td> 
                                    @switch($page->ps_type)
                                        @case(1)
                                            <span>Về chúng tôi</span>
                                            @break
                                        @case(2)
                                            <span>Thông tin giao hàng</span>
                                            @break
                                        @case(3)
                                            <span>Chính sách bảo mật</span>
                                            @break
                                        @case(4)
                                            <span>Điều khoản sử dụng</span>
                                            @break
                                    @endswitch
                                </td>                 
                                <td>{{$page->created_at->format('d-m-Y')}}</td>
                                {{-- <td>{{$page->ps_name}}</td>  --}}
                                <td>
                                    <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px" href="{{route('admin.get.edit.page_static',$page->id)}}"> <i class="fas fa-edit"></i> </a>
                                    <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px" href="{{route('admin.get.action.page_static',['delete',$page->id])}}"> <i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>    
                            <?php $stt++ ?>    
                        @endforeach
                    @endif                                
                </tbody>
            </table>
    </div>
@stop
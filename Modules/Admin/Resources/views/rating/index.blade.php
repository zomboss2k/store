@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
           <ol class="breadcrumb">
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Đánh giá</a></li>
                <li class="active">Danh sách</li>   
            </ol>
    </div>
    <div class="table-responsive">
            <h2 class="page-header">Quản lý đánh giá </h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Người đánh giá</th>
                        <th>Tên sản phẩm</th>
                        <th>Nội dung</th>
                        <th>Số sao</th>
                        <th>Thời gian</th>
                        <th>Thao tác</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 1 ?>
                    @if(isset($ratings))
                        @foreach ($ratings as $rating)
                        {{-- {{ dd($ratings)}} --}}
                        <tr>
                            <td>{{$stt}}</td>                 
                            <td>{{ $rating->user->name ? $rating->user->name : '[N\A]'}}</td>
                            <td><a href="">{{ $rating->product->pro_name ? $rating->product->pro_name : '[N\A]'}}</a></td>
                            <td>{{$rating->ra_content}}</td>
                            <td>{{$rating->ra_number}} <i class="fa fa-star" style= "color: #ff9705"></i></td>
                            <td>{{$rating->created_at->format('d-m-Y')}}</td>
                            <td>
                                {{-- sua, xoa user --}}
                            <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px" href="{{route('admin.get.action.rating',['delete',$rating->id])}}"><i class="fas fa-trash-alt"> Xóa</i></a>
                            </td>
                        </tr>  
                        <?php $stt++ ?>
                        @endforeach
                    @endif
                </tbody>
            </table>
    </div>
@stop
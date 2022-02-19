@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
           <ol class="breadcrumb">
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Thành viên</a></li>
                <li class="active">Danh sách</li>   
            </ol>
    </div>
    <div class="table-responsive">
            <h2 class="page-header">Quản lý thành viên </h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên hiển thị</th>
                        <th>Địa chỉ email</th>
                        <th>Số điện thoại</th>
                        <th>Hình ảnh</th>
                        <th>Thao tác</th>
                        {{-- <th>Thao tác</th> --}}
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 1 ?>
                    @if(isset($users))
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$stt}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                <img src="{{pare_url_file($user->avatar)}}" alt="" class="img img-responsive" style="width: 80px; height: 80px">
                            </td>
                            <td>
                                
                            {{-- <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px" href="{{route('admin.get.edit.product',$user->id)}}"><i class="fas fa-pen"></i></a> --}}
                            {{-- <i style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px" href="{{route('admin.get.delete.user',['delete',$user->id])}}"><i class="fas fa-trash-alt"></i></i> --}}
                            </td>
                        </tr>  
                        <?php $stt++ ?>
                        @endforeach
                    @endif
                </tbody>
            </table>
    </div>
@stop
@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
           <ol class="breadcrumb">
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li class="active">Danh sách</li>   
            </ol>
    </div>
    <div class="table-responsive">
            <h2 class="page-header">Quản lý liên hệ </h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Nội dung</th>
                        <th>Trạng thái</th>
                        <th>Thời gian</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($contacts))
                        @foreach ($contacts as $contact)
                        {{-- {{ dd($contacts)}} --}}
                        <tr>
                            <td>{{$contact->id}}</td>
                            <td>{{$contact->ct_title}}</td>
                            <td>{{$contact->ct_name}}</td>
                            <td>{{$contact->ct_email}}</td>
                            <td>{{$contact->ct_content}}</td>
                            <td>
                                @if ($contact->ct_status == 1)
                                    <span class="label label-success">Đã xử lý</span>
                                @else 
                                    <span class="label label-warning">Chưa xử lý</span>
                                @endif
                            </td>
                            <td>{{$contact->created_at->format('d-m-Y')}}</td>
                            <td>
                                {{-- sua, xoa user --}}
                            <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px" href="{{route('admin.get.action.contact',['delete',$contact->id])}}"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>  
                        @endforeach
                    @endif
                </tbody>
            </table>
    </div>
@stop
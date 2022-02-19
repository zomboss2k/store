@extends('layouts.app')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inner">
                    <ul>
                        <li class="home">
                            <a href="index.html">Trang chủ</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="home">
                        <a href="{{route('get.list.shopping.cart')}}">Giỏ Hàng</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>Thanh toán</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-contact-area">
    <div class="container wrapper">
        <div class="row cart-body">
            <form class="form-horizontal" method="post" action="">
                @csrf
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                        Danh sách sản phẩm <div class="pull-right"><small><a class="afix-1" href="{{route('get.list.shopping.cart')}}"><h4><i class="fa fa-edit"></i></h4></a></small></div>
                        </div>
                        <div class="panel-body">
                            @foreach ($products as $product)   
                                {{-- {{dd($product)}} --}}
                                <div class="form-group">
                                    <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" style="width:100px; height: 70px; " src="{{pare_url_file($product->options->avatar)}}" />
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">{{$product->name}}</div>
                                        <div class="col-xs-12"><small>Số lượng x<span>{{$product->qty}}</span></small></div>
                                    </div>
                                    <div class="col-sm-3 col-xs-3 text-right">
                                    <h6>{{number_format($product->price,0,',','.')}} <span>đ</span></h6>
                                    </div>
                                </div>
                                <div class="form-group"><hr /></div>                    
                            @endforeach                     
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong><h4>Tổng tiền</h4></strong>
                                    <div class="pull-right"><span>{{str_replace(',','.',\Cart::subtotal(0,3)) }}</span>đ<span></span></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Phiếu thanh toán</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Thông tin thanh toán</h4>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>Họ và tên khách hàng:</strong>
                                    <input type="text" name="name" class="form-control" value="{{get_data_user('web','name')}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Địa chỉ:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" required value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Tỉnh/Thành phố:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="city" class="form-control" required value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Số điện thoại:</strong></div>
                                <div class="col-md-12"><input type="text" name="phone" class="form-control" value="{{get_data_user('web','phone')}}" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email:</strong></div>
                                {{-- mặc định lấy dữ liệu email --}}
                            <div class="col-md-12"><input type="text" name="email" class="form-control" value="{{get_data_user('web','email')}}" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Ghi chú:</strong></div>
                                <div class="col-md-12">
                                    <textarea name="note" id="" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><button type="submit" class="btn btn-success">Xác nhận thông tin</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row cart-footer">
    
        </div>
</div>
</div>

@stop
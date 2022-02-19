@extends('layouts.app')
@section('content')
    <div class="our-product-area new-product">
        <div class="container">   
            <div class="area-title">
                <h2>Giỏ hàng của bạn</h2>
            </div> 
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1 ?>
                    @foreach($products as $key=>$product)
                        {{-- {{dd($product)}} ; --}}
                        {{-- {{dd($key)}} ; --}}
                        <tr> 
                            <td>#{{$i}}</td>
                            <td><a href="">{{$product->name}}</a></td>
                            <td><img style="width: 80px; height: 60px"   src="{{pare_url_file($product->options->avatar)}}" alt=""></td>
                            <td>{{number_format($product->price,0,',','.')}} đ</td>
                            <td> x{{$product->qty}}</td>
                            <td>{{number_format($product->qty*$product->price,0,',','.') }} đ</td>
                            <td>
                                <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 14px" href=""> <i class="fa fa-edit"></i> </a>
                                {{-- Xoa san pham khoi don hang theo key --}}
                                <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 14px" href="{{route('delete.shopping.cart',$key)}}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
                <h4  class="pull-right"> Tổng tiền cần thanh toán {{ str_replace(',','.',\Cart::subtotal(0,3)) }} đ <a href="{{route('get.form.pay')}}" class="btn-success btn"><b>Thanh toán</b></a></h4>
       
        </div> 
    </div>    

@stop
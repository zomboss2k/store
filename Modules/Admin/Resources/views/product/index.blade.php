@extends('admin::layouts.master')
@section('content')
    <style>
        .rating .active
        { color: #ff9705 !important  }
       
    </style>
    <div class="page-header">
           <ol class="breadcrumb">
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Sản phẩm</a></li>
                <li class="active">Danh sách</li>   
            </ol>
    </div>
    {{-- Form lọc sản phẩm --}}
     <div class="row">
         <div class="col-sm-12">
                <form class="form-inline" action="" style="margin-bottom: 20px">
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Tên sản phẩm ..." name="name" value="{{\Request::get('name')}}">
                    </div>
                    <div class="form-group">
                        <select name="cate" id="" class="form-control">
                            <option value="">Danh mục</option>
                                @if(isset($categories))
                                    @foreach ($categories as $category)
                                      <option value="{{$category->id}}" {{\Request::get('cate') == $category->id ? "selected='selected'" : "" }}> {{$category->c_name}}</option>
                                    @endforeach
                                @endif

                        </select>
                    </div>

                    <button type="submit" class="btn btn-info"><i class="fas fa-filter"></i></button>
                </form>
         </div>
     </div>

    <div class="table-responsive">
            <h2 class="page-header">Quản lý sản phẩm <a href="{{route('admin.get.create.product')}}"class="pull-right"><i class="fas fa-plus-circle"></i></a></h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm</th>
                        <th>Loại sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Trạng thái</th>
                        <th>Nổi bật</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                         {{-- kiểm tra --}}
                   <?php $stt = 1 ?>
                    @if (isset($products))
                        @foreach ($products as $product)
                            <?php
                                // điểm đánh giá trung bình 
                                 $age =0;
                                // dd($product);    
                                if($product->pro_total_rating)
                                {
                                    $age = round($product->pro_total_number/ $product->pro_total_rating,2);
                                }
                             ?>
                            <tr> 
                                <td>{{$stt}}</td>
                                <td>
                                    <ul  style="list-style-type:none;" class="list-group" style="padding-left: 15px">
                                        <li><i class="fas fa-shopping-bag" style="color: darkslategray;"></i> <a href="">{{$product->pro_name}}</a></li>
                                        <li><i class="fas fa-coins" style="color:goldenrod;"></i> {{number_format($product->pro_price,0,',','.')}} <a href="">đ</a> </li>
                                        <li><span>Giảm giá:<span style="color:red;"> - {{number_format($product->pro_sale,1)}}</span> <a href="">%</a></span> </li>
                                        {{-- đánh giá --}}
                                        <li>
                                            <span>Đánh giá:</span>
                                            <span class="rating">
                                                @for($i =1; $i<=5;$i++)
                                                    <i class="fa fa-star {{$i<= $age ? 'active': '' }}" style= "color: #999"></i>
                                                @endfor
                                            </span>
                                            <span> {{$age}} </span>
                                        </li>
                                    </ul>
                                </td>
                                {{-- kiem tra loi khi lay ten danh muc , ha bi xoa [N/A] --}}
                                <td>
                                    <ul style="list-style-type:none;" class="list-group" style="padding-left: 15px">
                                        <li><i class="fas fa-stream"></i> <a href="">{{isset($product->category->c_name)? $product->category->c_name :'[N\A]'}}</a></li>
                                        <li>
                                           {{-- Số lượng --}}
                                           <span>[ <a href="">Kho</a>: {{$product->pro_number}} ]</span> 
                                        </li> 
                                        
                                    </ul>
                                </td>
                                {{-- hien thi  hình anh  --}}
                                <td> <img src="{{pare_url_file($product->pro_avatar)}}" alt="" class="img img-responsive" style="width: 80px; height: 80px">
                                </td>
                                                           
                                {{-- Thay đổi trạng thái getsatus --}}
                                <td>                                   
                                    <a href="{{route('admin.get.action.product',['active',$product->id])}}" class="label {{$product->getStatus($product->c_active)['class']}}">{{$product->getStatus($product->c_active)['name']}}</a>
                                </td>
                                <td>
                                     {{-- Thay đổi trạng thái gethot --}}
                                    <a href="{{route('admin.get.action.product',['hot',$product->id])}}" class="label {{$product->gethot($product->c_hot)['class']}}">{{$product->gethot($product->c_hot)['name']}}</a>
                                </td>
                                <td>
                                    {{-- sua, xoa pro --}}
                                <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 14px" href="{{route('admin.get.edit.product',$product->id)}}"><i class="fas fa-edit"></i></a>
                                <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 14px" href="{{route('admin.get.action.product',['delete',$product->id])}}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>        
                        <?php $stt++ ?>
                        @endforeach
                       

                    @endif            
                    
                    
                </tbody>
            </table>
            {{-- Phân trang admin sản phẩm --}}
            {!! $products->links()!!}
    </div>
@stop
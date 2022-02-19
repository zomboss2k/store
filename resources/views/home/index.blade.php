@extends('layouts.app')
@section('content')
<!-- start home slider -->
@include('components.slide')
<!-- end home slider -->
<style>
    
    .active {
        color: #ff9705;
    }

</style>

<!-- Sản phẩm nổi bật -->
<div class="our-product-area new-product">
   <div class="container">
       <div class="area-title" >
           <h2 >Sản phẩm nổi bật</h2>
       </div>
       <!-- our-product area start -->
       <div class="row">
           <div class="col-md-12">
            <div class="row">
                <div class="features-curosel">
                    @foreach ($productHot as $proHot)
                    <!-- single-product start --> 
                    <div class="col-lg-12 col-md-12">
                        <div class="single-product first-sale">
                             <div class="product-img">
                                 {{-- show hết hàng --}}
                                @if($proHot->pro_number == 0)
                                <span style="position: absolute;background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100% );color: black; padding: 1px 7px; padding-left:0; padding-right:10px;"><b> TẠM THỜI HẾT HÀNG</b></span>
                                @endif 
                                @if($proHot->pro_sale > 0)
                                <span style="position: absolute;right: 0; background: tomato; color: white; padding: 4px 10px; border-radius: 5px; font-size:10px; "><b>GIẢM {{$proHot->pro_sale}}%</b></span>
                                @endif 
                                <a href="{{route('get.detail.product',[$proHot->pro_slug,$proHot->id])}}">
                                    <img class="primary-image" src="{{asset(pare_url_file($proHot->pro_avatar))}}" alt="" />
                                    <img class="secondary-image" src="{{asset(pare_url_file($proHot->pro_avatar))}}" alt="" />
                                </a>
                                <div class="action-zoom">
                                    <div class="add-to-cart">
                                        <a href="{{route('get.detail.product',[$proHot->pro_slug,$proHot->id])}}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                    </div>
                                </div>
                                <div class="actions">
                                    <div class="action-buttons">
                                        <div class="add-to-links">
                                            <div class="add-to-wishlist">
                                                <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                            </div>
                                            <div class="compare-button">
                                                <a href="{{route('add.shopping.cart',$proHot->id)}}" title="Add to Cart"><i class="icon-bag"></i></a>
                                            </div>
                                        </div>
                                        <div class="quickviewbtn">
                                            <a href="{{route('get.detail.product',[$proHot->pro_slug,$proHot->id])}}" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                        </div>
                                    </div>
                                </div> 
                                <div class="price-box">
                                <span class="new-price">{{number_format($proHot->pro_price,0,',','.')}} đ</span>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2 class="product-name"><a href="#">{{$proHot->pro_name}}</a></h2>
                                <p>{{$proHot->pro_description}}</p>
                            </div>
                        </div>
                     </div>  
                     @endforeach
                     <!-- single-product end -->
                </div>
            </div>
           </div>
       </div>
       <!-- our-product area end -->	
   </div>
</div>
<!-- Sản phẩm nổi bật  -->

<!-- banner-area start -->
@include('components.banner')
<!-- banner-area end -->

<!-- Các danh mục nổi bật -->
<div class="block-category">
   <div class="container">
        <div class="area-title">
             <h2> Danh mục nổi bật</h2>
        </div> 
        <div class="row">
           @if( isset($categoriesHome))
           <!-- featured block start -->
            @foreach ($categoriesHome as $categoriHome)  
                     {{-- layout danh muc --}}
                <div class="col-md-4">
                    <!-- block title start -->
                    <div class="block-title">
                        <h2>{{$categoriHome->c_name}}</h2>
                    </div>
                    <!-- block title end -->
                    <!-- block carousel start -->
                    @if(isset($categoriHome->products))
                        <div class="block-carousel">
                            @foreach ( $categoriHome->products as $product)
                                {{-- Show đánh giá --}}
                                <?php
                                // điểm đánh giá trung bình 
                                    $ageDetail = 0;
                                    // dd($productDetail);    
                                    if($product->pro_total_rating)
                                    {
                                        $ageDetail = round($product->pro_total_number/ $product->pro_total_rating,2);
                                    }
                                ?>                         
                                <div class="block-content">
                                    <!-- single block start -->
                                    <div class="single-block">
                                        <div class="block-image pull-left">
                                            <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}"><img src="{{pare_url_file($product->pro_avatar)}}" style="width: 170px ; height: 208px;" alt="" /></a>
                                        </div>
                                        <div class="category-info">
                                            <h3><a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}">{{$product->pro_name}}</a></h3>
                                            <p>{{$product->pro_description}}</p>
                                            <div class="cat-price">{{number_format($product->pro_price,0,',','.')}} đ<span class="old-price">{{number_format($product->pro_price,0,',','.')}} đ</span></div>
                                            <div class="cat-rating">
                                                @for($i =1;$i<=5; $i++)
                                                    <a href="#"><i class="fa fa-star {{$i<=$ageDetail ? 'active' : ''}}"></i></a>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single block end -->
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <!-- block carousel end -->
                </div>
           @endforeach
           
           <!-- featured block end -->
          @endif
          
       </div>
   </div>
</div>
<!-- Các danh mục nổi bật -->

{{-- Bài viết mới nhất  --}}
@if(isset($articleNews))
<div class="latest-post-area">
   <div class="container">
       <div class="area-title">
           <h2>Bài viết mới</h2>
       </div>
       <div class="row">
           <div class="all-singlepost">
               <!-- single latestpost start -->
               @foreach ($articleNews as $arNew)
                  <div class="col-md-4 col-sm-4 col-xs-12">
                   <div class="single-post" style="margin-bottom: 40px">
                       <div class="post-thumb">
                           <a href="{{route('get.detail.article',[$arNew->a_slug,$arNew->id])}}">
                           <img src="{{asset(pare_url_file($arNew->a_avatar_seo))}}" alt="" style="width: 370px; height: 280px "/>
                           </a>
                       </div>
                       <div class="post-thumb-info">
                           <div class="post-time">
                            <p><i class="fa fa-calendar" aria-hidden="true"></i> {{$arNew->created_at->format('d-m-Y')}}</p>
                           </div>
                           <div class="postexcerpt">
                               <a href="{{route('get.detail.article',[$arNew->a_slug,$arNew->id])}}"> <p style=" height: 40px"><i class="fa fa-chevron-right" aria-hidden="true"></i> {{$arNew->a_name}}</p></a>
                                <a href="{{route('get.detail.article',[$arNew->a_slug,$arNew->id])}}" class="read-more">Xem thêm</a>
                           </div>
                       </div>
                   </div>
               </div> 
               @endforeach
               
               <!-- single latestpost end -->
            </div>
       </div>
   </div>
</div>
@endif
<!-- Bài viết mới nhất -->

{{-- sản phẩm đã xem --}}
<div id="product_view"> </div>
{{-- sản phẩm đã xem --}}





<!-- testimonial area end -->
<div class="testimonial-area lap-ruffel">
   <div class="container">
       <div class="row">
           <div class="col-md-12">
               <div class="crusial-carousel">
                   <div class="crusial-content">
                        <marquee onmouseover=" this.stop()" onmouseout=" this.start()">
                            <p>"Đem lại cho Quý Khách Sản phẩm & Dịch vụ tốt nhất trong lĩnh vực Công nghệ Điện tử và IoT. Chúng tôi đang ngày càng hoàn thiện sản phẩm và dịch vụ của mình nhằm không ngừng đáp ứng sự tin tưởng và niềm tin của khách hàng."</p>
                        </marquee>
                        <span>Admin</span>
                   </div>
                   <div class="crusial-content">
                        <marquee onmouseover=" this.stop()" onmouseout=" this.start()">
                            <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                        </marquee>
                        <span>Jack Ma</span>
                    </div>
                    <div class="crusial-content">
                        <marquee onmouseover=" this.stop()" onmouseout=" this.start()">
                            <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                        </marquee>
                        <span>Jack Ma</span>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
<!-- testimonial area end -->

<!-- Brand Logo Area Start -->
<div class="brand-area">
   <div class="container">
    <div class="area-title">
        <h2>NHÀ CUNG CẤP UY TÍN</h2>
    </div>
       <div class="row">
           <div class="brand-carousel">
               <div class="brand-item"><a href="#"><img src="img/brand/bg1-brand.jpg" alt="" /></a></div>
               <div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
               <div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
               <div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
               <div class="brand-item"><a href="#"><img src="img/brand/bg5-brand.jpg" alt="" /></a></div>
               <div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
               <div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
               <div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
           </div>
       </div>
   </div>
</div>
<!-- Brand Logo Area End -->
    
@stop

@section('script')
    
<script>
    $(function () {

        $.ajaxSetup({
             headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        let routeRenderProduct = '{{ route('post.product.view')}}';
        checkRenderProduct = false;
        $(document).on('scroll',function () {
            if($(window).scrollTop() > 150 && checkRenderProduct == false){
                // console.log('scroll');
                //  console.log('ok');
                checkRenderProduct = true;
                let products = localStorage.getItem('products');
                products = $.parseJSON(products)
                if (products.length > 0)
                {
                    $.ajax({
                        url : routeRenderProduct,
                        method: "POST",
                        data: {id: products},
                        success : function (result) 
                        {
                            console.log(result);
                            $("#product_view").html('').append(result.data)
                        }
                    });
                }
            }
        });
    })

</script>
    
@endsection
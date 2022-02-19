@extends('layouts.app')
@section('content')
<style>
    .product-tab-content{
        overflow: hidden;
    }
    .product-tab-content h2 {font-size: 24px !important;}
    .product-tab-content h3 {font-size: 20px !important;}
    .product-tab-content h4 {font-size: 18px !important;}
    .product-tab-content img {
        margin: o auto;
        text-align: center;
        max-width: 100%;
        display: block;
    }
    .list_start i:hover {
        cursor: pointer;
    }
    .list_text{
    display: inline-block;
    margin-left: 10px;
    position: relative;
    background: #52b858;
    color: #fff;
    padding: 2px 8px;
    box-sizing: border-box;
    font-size: 12px;
    border-radius: 2px;
    display: none;
    }
    .list_text::after {
    right: 100%;
    top: 50%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-color: rgba(82,184,88,0);
    border-right-color: #52b858;
    border-width: 6px;
    margin-top: -6px;
    }
    .list_start .rating_active, .pro-rating .active {
        color: #ff9705;
    }
    }
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
                        <a href="">{{$cateProduct->c_name}}</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>{{$productDetail->pro_name}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-details-area" id="content_product" data-id="{{$productDetail->id}}" >
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="zoomWrapper">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                        <div style="height:420px;width:420px;" class="zoomWrapper"><img id="zoom1" src="{{asset(pare_url_file($productDetail->pro_avatar))}}" data-zoom-image="{{pare_url_file($productDetail->pro_avatar)}}" alt="big-1" style="position: absolute;"></div>
                        </a>
                    </div>
                    {{-- <div class="single-zoom-thumb">
                        <div class="bx-wrapper" style="max-width: 365px;"><div class="bx-viewport" aria-live="polite" style="width: 100%; overflow: hidden; position: relative; height: 83px;"><ul class="bxslider" id="gallery_01" style="width: 8215%; position: relative; transition-duration: 0s; transform: translate3d(-380px, 0px, 0px);"><li class="bx-clone" style="float: left; list-style: none; position: relative; width: 80px; margin-right: 15px;" aria-hidden="true">
                                <a href="#" class="elevatezoom-gallery" data-image="{{pare_url_file($productDetail->pro_avatar)}}" data-zoom-image="{{pare_url_file($productDetail->pro_avatar)}}"><img src="{{pare_url_file($productDetail->pro_avatar)}}" alt="zo-th-5"></a>
                            </li><li class="bx-clone" style="float: left; list-style: none; position: relative; width: 80px; margin-right: 15px;" aria-hidden="true">
                                <a href="#" class="elevatezoom-gallery" data-image="{{pare_url_file($productDetail->pro_avatar)}}" data-zoom-image="{{pare_url_file($productDetail->pro_avatar)}}"><img src="{{pare_url_file($productDetail->pro_avatar)}}" alt="ex-big-3"></a>
                            </li><li class="bx-clone" style="float: left; list-style: none; position: relative; width: 80px; margin-right: 15px;" aria-hidden="true">
                                <a href="#" class="elevatezoom-gallery" data-image="{{asset(pare_url_file($productDetail->pro_avatar))}}" data-zoom-image="{{asset(pare_url_file($productDetail->pro_avatar))}}"><img src="{{asset(pare_url_file($productDetail->pro_avatar))}}" alt="ex-big-3"></a>
                            </li><li class="bx-clone" style="float: left; list-style: none; position: relative; width: 80px; margin-right: 15px;" aria-hidden="true">
                                <a href="#" class="elevatezoom-gallery" data-image="{{asset(pare_url_file($productDetail->pro_avatar))}}" data-zoom-image="{{asset(pare_url_file($productDetail->pro_avatar))}}"><img src="{{asset(pare_url_file($productDetail->pro_avatar))}}" alt="ex-big-3"></a>
                            </li>
                            <li style="float: left; list-style: none; position: relative; width: 80px; margin-right: 15px;" aria-hidden="false">
                                <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{asset(pare_url_file($productDetail->pro_avatar))}}" data-zoom-image="{{asset(pare_url_file($productDetail->pro_avatar))}}"><img src="{{asset(pare_url_file($productDetail->pro_avatar))}}" alt="zo-th-1"></a>
                            </li>
                            <li class="" style="float: left; list-style: none; position: relative; width: 80px; margin-right: 15px;" aria-hidden="false">
                                <a href="#" class="elevatezoom-gallery" data-image="{{asset(pare_url_file($productDetail->pro_avatar))}}" data-zoom-image="{{asset(pare_url_file($productDetail->pro_avatar))}}"><img src="{{asset(pare_url_file($productDetail->pro_avatar))}}" alt="zo-th-2"></a>
                            </li>
                            <li class="" style="float: left; list-style: none; position: relative; width: 80px; margin-right: 15px;" aria-hidden="false">
                                <a href="#" class="elevatezoom-gallery" data-image="{{asset(pare_url_file($productDetail->pro_avatar))}}" data-zoom-image="{{asset(pare_url_file($productDetail->pro_avatar))}}"><img src="{{asset(pare_url_file($productDetail->pro_avatar))}}" alt="ex-big-3"></a>
                            </li>
                            <li class="" style="float: left; list-style: none; position: relative; width: 80px; margin-right: 15px;" aria-hidden="true">
                                <a href="#" class="elevatezoom-gallery" data-image="{{asset(pare_url_file($productDetail->pro_avatar))}}" data-zoom-image="{{asset(pare_url_file($productDetail->pro_avatar))}}"><img src="{{asset(pare_url_file($productDetail->pro_avatar))}}" alt="zo-th-4"></a>
                            </li>
                            <li class="" style="float: left; list-style: none; position: relative; width: 80px; margin-right: 15px;" aria-hidden="true">
                                <a href="#" class="elevatezoom-gallery" data-image="{{asset(pare_url_file($productDetail->pro_avatar))}}" data-zoom-image="{{asset(pare_url_file($productDetail->pro_avatar))}}"><img src="{{asset(pare_url_file($productDetail->pro_avatar))}}" alt="zo-th-5"></a>
                            </li>
                            <li class="" style="float: left; list-style: none; position: relative; width: 80px; margin-right: 15px;" aria-hidden="true">
                                <a href="#" class="elevatezoom-gallery" data-image="{{asset(pare_url_file($productDetail->pro_avatar))}}" data-zoom-image="{{asset(pare_url_file($productDetail->pro_avatar))}}"><img src="{{asset(pare_url_file($productDetail->pro_avatar))}}" alt="ex-big-3"></a>
                            </li>
                            <li class="" style="float: left; list-style: none; position: relative; width: 80px; margin-right: 15px;" aria-hidden="true">
                                <a href="#" class="elevatezoom-gallery" data-image="{{asset(pare_url_file($productDetail->pro_avatar))}}" data-zoom-image="{{asset(pare_url_file($productDetail->pro_avatar))}}"><img src="{{asset(pare_url_file($productDetail->pro_avatar))}}" alt="ex-big-3"></a>
                            </li>
                            <li class="" style="float: left; list-style: none; position: relative; width: 80px; margin-right: 15px;" aria-hidden="true">
                                <a href="#" class="elevatezoom-gallery" data-image="{{asset(pare_url_file($productDetail->pro_avatar))}}" data-zoom-image="{{asset(pare_url_file($productDetail->pro_avatar))}}"><img src="{{asset(pare_url_file($productDetail->pro_avatar))}}" alt="ex-big-3"></a>
                            </li>
                             <li style="float: left; list-style: none; position: relative; width: 80px; margin-right: 15px;" class="bx-clone" aria-hidden="true">
                                <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{pare_url_file($productDetail->pro_avatar)}}" data-zoom-image="{{pare_url_file($productDetail->pro_avatar)}}"><img src="{{pare_url_file($productDetail->pro_avatar)}}" alt="zo-th-1"></a>
                            </li><li class="bx-clone" style="float: left; list-style: none; position: relative; width: 80px; margin-right: 15px;" aria-hidden="true">
                                <a href="#" class="elevatezoom-gallery" data-image="{{pare_url_file($productDetail->pro_avatar)}}" data-zoom-image="{{pare_url_file($productDetail->pro_avatar)}}"><img src="{{pare_url_file($productDetail->pro_avatar)}}" alt="zo-th-2"></a>
                            </li><li class="bx-clone" style="float: left; list-style: none; position: relative; width: 80px; margin-right: 15px;" aria-hidden="true">
                                <a href="#" class="elevatezoom-gallery" data-image="img/product-details/big-1-3.jpg" data-zoom-image="img/product-details/ex-big-1-3.jpg"><img src="img/product-details/th-1-3.jpg" alt="ex-big-3"></a>
                            </li><li class="bx-clone" style="float: left; list-style: none; position: relative; width: 80px; margin-right: 15px;" aria-hidden="true">
                                <a href="#" class="elevatezoom-gallery" data-image="img/product-details/big-4.jpg" data-zoom-image="img/product-details/ex-big-4.jpg"><img src="img/product-details/th-4.jpg" alt="zo-th-4"></a>
                            </li></ul></div><div class="bx-controls bx-has-controls-direction"><div class="bx-controls-direction"><a class="bx-prev" href="">Prev</a><a class="bx-next" href="">Next</a></div></div></div>
                    </div> --}}
                </div>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="product-list-wrapper">
                    <div class="single-product">
                        <div class="product-content">
                        <h1 class="product-name"><a href=""></a>{{$productDetail->pro_name}}</h1>
                            <div class="rating-price">	
                                {{-- Show đánh giá --}}
                                <?php
                                // điểm đánh giá trung bình 
                                    $ageDetail = 0;
                                    // dd($productDetail);    
                                    if($productDetail->pro_total_rating)
                                    {
                                        $ageDetail = round($productDetail->pro_total_number/ $productDetail->pro_total_rating,2);
                                    }
                                ?>

                                <div class="pro-rating">
                                    @for($i =1;$i<=5; $i++)
                                        <a href="#"><i class="fa fa-star {{$i<=$ageDetail ? 'active' : ''}}"></i></a>
                                    @endfor
                                </div>
                                <div class="price-boxes">
                                <span class="new-price">{{number_format($productDetail->pro_price,0,',','.')}} đ</span>
                                </div>
                            </div>
                            <div class="product-desc">
                            <p>{{$productDetail->pro_description}}</p>
                            </div>
                            <p class="availability in-stock">Số lượng sản phẩm: <span> {{$productDetail->pro_number}} Trong kho</span></p>
                            <div class="actions-e">
                                <div class="action-buttons-single">
                                    <div class="inputx-content">
                                        <label for="qty">Số lượng:</label>
                                        <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty">
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="{{route('add.shopping.cart',$productDetail->id)}}">Thêm giỏ hàng</a>
                                    </div>
                                    <div class="add-to-links">
                                        <div class="add-to-wishlist">
                                            <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                        </div>
                                        <div class="compare-button">
                                            <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
                                        </div>									
                                    </div>
                                </div>
                            </div>
                            <div class="singl-share">
                            {{-- <a href="#"><img src="{{asset(pare_url_file($productDetail->pro_avatar))}}" alt=""></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="single-product-tab">
                <div class="tab-content">
                    <h3>Thông tin sản phẩm</h3>
                  <!-- Tab panes -->
                </div> 
                    <div role="tabpanel" class="tab-pane active" id="home" style="border-radius: 5px; border:1px solid #dedede; " >
                        <div class="product-tab-content">
                            {!!$productDetail->pro_content!!}	
                        </div>
                    </div>
                    <div class="componet_rating" style="margin-bottom: 20px" >
                        <h3 margin: 10 15px; >Đánh giá sản phẩm</h3>
                        <div class="componet_rating_content" style="display: flex; align-items: center; border-radius: 5px; border:1px solid #dedede; ">
                            <div class="rating_item" style="width:20%;position: relative; ">
                            <span class="fa fa-star" style="font-size: 100px; display: block; color: darkorange; margin: 0 auto; text-align: center;" ></span><b style="position: absolute; top: 50%; left:50%;transform:translateX(-50%) translateY(-50%);color: white; font-size: 20px;">{{$ageDetail}}</b>
                            </div>           
                            <div class="list_rating" style="width:60%; padding: 20px">
                                @for($i = 1; $i<=5;$i++)
                                <div class="item_rating" style="display: flex; align-items: center ">
                                        <div class="" style="width: 10%; font-size:14px; ">
                                            {{$i}}  <span class="fa fa-star"></span>
                                        </div>
                                        <div style="width: 70%; margin: 0 20px;">
                                            <span style="width: 100%; height: 6px; display: block; border:1px solid #dedede;border-radius:5px;background-color: #dedede;"><b style="width:30%; background-color: #f25800; display: block; height: 100%; border-radius:5px;" ></b></span>
                                        </div>
                                        <div style="width: 20%">
                                            <a href="">290 đánh giá</a>
                                        </div>
                                    </div>
                                @endfor  
                            </div>
                            <div style="width: 20%">
                                <a href="" class="js_rating_action" style="width: 200px;background: #288ad6; padding: 10px; color: white; border-radius: 5px;">Đánh giá sản phẩm</a>
                            </div> 
                     </div>
                     {{-- hide --}}
                    <div class="form_rating hide">
                        <div style="display: flex; margin-top:15px; font-size: 15px ">
                            <p style="margin-bottom: 0">Chọn đánh giá của bạn</p>
                            <span style="margin: 0 15px;" class="list_start">
                                @for($i =1 ;$i<=5; $i++)
                                  <i class="fa fa-star" data-key="{{$i}}"></i>
                                @endfor
                            </span>
                            <span class="list_text"></span>
                            <input type="hidden" value="" class="number_rating">
                        </div>
                        <div style="margin-top: 15px">
                            <textarea name="" class="form-control" id="ra_content" cols="30" rows="3"></textarea>
                        </div>
                        <div style="margin-top: 15px">
                            {{-- chèn route +id trả về  --}}
                        <a href="{{route('post.rating.product',$productDetail)}}" class="js_rating_product" style="width: 200px;background: #288ad6; padding: 10px; color: white;border-radius: 5px;">Gửi đánh giá</a>
                        </div>
                    </div>
                </div>					
            </div>
        </div>
    </div>
</div>
@stop

@section('script') 
     
    <script>
        // sử dung token khi dung post
        $.ajaxSetup({
             headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
       
        $(function(){
            let listStart = $(".list_start .fa");
            listRatingText =  {
                         1:'Không thích',
                         2:'Tạm được',
                         3:'Không thích',
                         4:'Rất tốt',
                         5:'Tuyệt vời quá',   
                        }  

            
            //  bắt sự kiện hover
            listStart.mouseover(function(){
                // khai báo con trỏ
                let $this = $(this);
                let number =$this.attr('data-key');
                listStart.removeClass('rating_active');
                // them giá trị trong input khi hover
                $(".number_rating").val(number);

                $.each(listStart, function(key,value){
                    // chay sao từ 0
                    if (key + 1 <= number)
                    {
                        $(this).addClass('rating_active');
                    }
                });

                    $(".list_text").text('').text(listRatingText[number]).show();

                console.log($this.attr('data-key'));
            });

            // bắt sự kiên click hiện form
            $(".js_rating_action").click(function (event) {
                // tắt request trang
                event.preventDefault();
                //  khi click add class hide và xóa hide
                if($(".form_rating").hasClass('hide'))
                {
                    $(".form_rating").addClass('active').removeClass('hide');
                } else {
                    $(".form_rating").addClass('hide').removeClass('active');
                }
            }); 

            //  Gửi đánh giá vào csdl
            $(".js_rating_product").click(function(e){
                event.preventDefault();

                let content = $("#ra_content").val();
                let number = $(".number_rating").val();
                // console.log( number);
                // console.log( content);
                let url = $(this).attr('href');

                //  kiểm tra tồn tại nội dung và số sao
                if (content && number) 
                {
                    $.ajax({
                        url:url,
                        // với post phải cần token laravel lên đầu trang app
                        type: "POST",
                        // dữ liệu lấy được ở trên
                        data: {
                            number: number,
                            r_content:content
                        }
                    }).done(function(result){
                        // console.log(result);
                        if(result.code == 1){
                            alert("Gửi đánh giá thành công");
                            location.reload();
                        }
                    })
                }

            });

            // js show sản phẩm đã xem
            // lưu id sản phẩm vào storage
            let idProduct = $("#content_product").attr('data-id');
            
            // Lấy giá trị storage id sản phẩm đã xem
            let products = localStorage.getItem('products');
            
            if(products == null)
            {
                arrayProduct = new Array();
                arrayProduct.push(idProduct);
                localStorage.setItem('products',JSON.stringify(arrayProduct));
            }else {
                // // lấy giá trị mãng đã lưu
                // let products = localStorage.getItem('products');

                // Chuyển về mảng
                products = $.parseJSON(products);

                if (products.indexOf(idProduct) == -1)
                {
                    products.push(idProduct);
                    localStorage.setItem('products',JSON.stringify(products));
                }
                console.log(products);
            }

        });

    </script>
    
@endsection 


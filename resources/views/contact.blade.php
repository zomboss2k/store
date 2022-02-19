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
                        <li class="category3"><span>Liên hệ</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-contact-area">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="contact-us-area">
                    <!-- google-map-area start -->
                    <div class="google-map-area">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6592.276606568435!2d108.24389736244407!3d15.97191348075479!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108878ee1dbf%3A0xb466fcf06b910a38!2zS2hvYSBDw7RuZyBuZ2jhu4cgdGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIC0gxJDhuqFpIGjhu41jIMSQw6AgTuG6tW5n!5e0!3m2!1svi!2s!4v1578623123926!5m2!1svi!2s" width="1170" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                    <!-- google-map-area end -->
                    <!-- contact us form start -->
                    <div class="contact-us-form">
                        {{-- required: bắt buộc nhập data (tính của thẻ input trong html)  --}}
                        <div class="contact-form">
                            <span class="legend">Mời bạn điền thông tin liên hệ</span>
                            <form action="" method="post">
                                @csrf
                                <div class="form-top">
                                    <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                        <label>Họ và tên <sup>*</sup></label>
                                        <input type="text" name="ct_name" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                        <label>Địa chỉ email của bạn <sup>*</sup></label>
                                        <input type="email" name="ct_email" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-10 col-md-10 col-lg-10">
                                        <label>Tiêu đề <sup>*</sup></label>
                                        <input type="text" name="ct_title" class="form-control" required>
                                    </div>											
                                  
                                    <div class="form-group col-sm-12 col-md-12 col-lg-10">
                                        <label>Nội dung<sup>*</sup></label>
                                        <textarea class="yourmessage" name="ct_content"required></textarea>
                                    </div>												
                                </div>
                                <div class="submit-form form-group col-sm-12 submit-review">
                                    <p><sup>*</sup>Phần bắt buộc</p>
                                   <button type="submit" class="btn btn-success"> Gửi thông tin</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- contact us form end -->
                </div>					
            </div>
        </div>
    </div>	
</div>

@stop
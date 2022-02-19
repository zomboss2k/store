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
                        <li class="category3"><span>Đăng ký</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="customer-login-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="customer-register my-account">
                    <form method="post" class="register">
                        <div class="form-fields">
                            <h2>Đăng ký</h2>
                            @csrf
                            <p class="form-row form-row-wide">
                                <label for="username">Họ và tên <span class="required">*</span></label>
                                <input type="text" class="input-text" name="name" id="username" value="">
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="reg_email">Địa chỉ Email <span class="required">*</span></label>
                                <input type="email" class="input-text" name="email" id="reg_email" value="">
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="reg_email">Số điện thoại <span class="required">*</span></label>
                                <input type="tel" class="input-text" name="phone" id="reg_phone" value="">
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="reg_password">Mật khẩu <span class="required">*</span></label>
                                <input type="password" class="input-text" name="password" id="reg_password">
                            </p>
                            <div style="left: -999em; position: absolute;">
                                <label for="trap">Anti-spam</label>
                                <input type="text" name="email_2" id="trap" tabindex="-1">
                            </div>
                        </div>
                        <div class="form-action">
                            <div class="actions-log">
                                <input type="submit" class="button" name="register" value="Đăng ký">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/dashboard/">
        
        {{-- Using a Font Awesome kit   --}}
        <script src="https://kit.fontawesome.com/f39fb36db2.js" crossorigin="anonymous"></script>
        
        <title>Admin | store.com</title>
        <!-- Bootstrap core CSS -->
         {{-- dung css theme_admin --}}
        <link href="{{asset('theme_admin/css/bootstrap.min.css')}}" rel="stylesheet">
        
        <link href="{{asset('theme_admin/css/dashboard.css')}}" rel="stylesheet">
        
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">STORE IOT | Xin chào {{get_data_user('admins','name')}}</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        
                        <li><a href="{{route('admin.logout')}}">Đăng xuất</a></li>
                        <li><a href="#">Cài đặt</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Tìm kiếm ...">
                    </form>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                {{-- menu trai --}}
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="{{\Request::route()->getName()=='admin.home'  ? 'active':'' }}">
                        <a href="{{route('admin.home')}}">Trang tổng quan<span class="sr-only">(current)</span></a>
                        </li>
                        {{-- Kiểm tra active --}}
                        <li class="{{\Request::route()->getName()=='admin.get.list.category' ? 'active':'' }}" ><a href="{{route('admin.get.list.category')}}">Danh mục</a></li>
                        <li class="{{\Request::route()->getName()=='admin.get.list.product'  ? 'active':'' }}"><a href="{{route('admin.get.list.product')}}">Sản phẩm</a></li>
                        <li class="{{\Request::route()->getName()=='admin.get.list.rating'  ? 'active':'' }}"><a href="{{route('admin.get.list.rating')}}">Đánh giá</a></li>
                        <li class="{{\Request::route()->getName()=='admin.get.list.article' ? 'active':'' }}" ><a href="{{route('admin.get.list.article')}}">Tin tức</a></li>
                        <li class="{{\Request::route()->getName()=='admin.get.list.transaction' ? 'active':'' }}" ><a href="{{route('admin.get.list.transaction')}}">Đơn hàng</a></li>
                        <li class="{{\Request::route()->getName()=='admin.get.list.user' ? 'active':'' }}" ><a href="{{route('admin.get.list.user')}}">Thành viên</a></li>
                        <li class="{{\Request::route()->getName()=='admin.get.list.contact' ? 'active':'' }}" ><a href="{{route('admin.get.list.contact')}}">Liên hệ</a></li>
                        <li class="{{\Request::route()->getName()=='admin.get.list.page_static' ? 'active':'' }}" ><a href="{{route('admin.get.list.page_static')}}">Trang tĩnh</a></li>
                        
                    </ul>                 
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                  {{-- check session --}}
                    @if(\Session::has('success'))
                    <div class="alert alert-success alert-dismissible" style="position: fixed; right: 2.5%; color: #3c763d; background-color: #dff0d8; border-color: #d6e9c6;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Thành công!</strong> {{\Session::get('success')}}
                    </div>
                    @endif 
                    @if(\Session::has('danger'))
                    <div class="alert alert-danger alert-dismissible" style="position: fixed; right: 2.5%; color: #3c763d; background-color: #dff0d8; border-color: #d6e9c6;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Thất bại!</strong> {{\Session::get('danger')}}
                    </div>
                    @endif   
    
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript -->

       {{-- js theme_admin --}}
        <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js')}}"></script>
        <script src="{{asset('theme_admin/js/bootstrap.min.js')}}"></script>
        <script>
            // hàm hiển thị hình anh sau khi up load
                function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function(e) {
                    $('#out_img').attr('src', e.target.result);
                    }
                     
                    reader.readAsDataURL(input.files[0]);
                    }
                }
                $("#input_img").change(function() {
                 readURL(this);
                });
       </script>
       @yield ('script')
    </body>
</html>
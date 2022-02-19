<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container" style="margin-top:200px">    
        
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
        
        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title text-center"> admin.store.com</div>
                
                <img src="http://banners.wunderground.com/banner/gizmotimetemp_both/language/www/global/stations/48855.gif" alt="Du bao thoi tiet - Thanh pho Da Nang" title="Dự báo thời tiết - Thành phố Đà Nẵng" height=41 width=127>
            </div>

            <div class="panel-body" >
                {{-- Form đăng nhập Admin --}}
                <form action=""  class="form-horizontal" enctype="multipart/form-data" method="POST">
                   @csrf
                    <div class="input-group" style="margin-bottom: 15px;">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="user" type="email" class="form-control" name="email" value="" placeholder="Email" required>                                        
                    </div>

                    <div class="input-group" style="margin-bottom: 15px;">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
                    </div>                                                                  
                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Đăng nhập</button>                          
                        </div>
                    </div>

                </form>     

            </div>                     
        </div>  
    </div>
</div>

<div id="particles"></div>


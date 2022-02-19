@extends('admin::layouts.master')
    <style>
        .highcharts-figure, .highcharts-data-table table {
        min-width: 310px; 
        max-width: 800px;
        margin: 1em auto;
    }

    #container {
        height: 400px;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #EBEBEB;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }
    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }
    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }
    .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
        padding: 0.5em;
    }
    .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }
    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
</style>

@section('content')
{{-- js Chart --}}
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

    {{-- noi dung trang --}}
    <h1 class="page-header">Tổng quan</h1>
    <div class="row placeholders">
        <div class="col-xs-6 col-sm-3 placeholder"  style="position: relative">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="150" height="150" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4 style="position: absolute; top: 50%;left: 50%; transform: translateX(-50%) translateY(-50%); color: white; margin: 0 %;">140 thành viên</h4>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder" >
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="150" height="150" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4 style="position: absolute; top: 50%;left: 50%; transform: translateX(-50%) translateY(-50%); color: white; margin: 0 %;"> 100 sản phẩm</h4>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder" >
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="150" height="150" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4 style="position: absolute; top: 50%;left: 50%; transform: translateX(-50%) translateY(-50%); color: white; margin: 0 %;">100 bài viết</h4>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder" >
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="150" height="150" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4 style="position: absolute; top: 50%;left: 50%; transform: translateX(-50%) translateY(-50%); color: white; margin: 0 %;"> 30 lượt đánh giá</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <h2>Biểu đồ doanh thu</h2>    
            {{-- html biểu đồ --}}
            <figure class="highcharts-figure">
                <div id="container"></div>
            </figure>
        </div>
        {{-- Show đơn hàng mới --}}
        <div class="col-sm-6">
            <h2>Danh sách đơn hàng mới</h2>    
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tài khoản</th>
                        <th>Số điện thoại</th>
                        <th>Tổng tiền</th>
                        <th>Tình trạng</th>                      
                        <th>Thời gian</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{dd( $transactions)}} --}}
                        @foreach($transactionNews as $transaction)
                            <tr>
                                <td ><a href="{{route('admin.get.list.transaction')}}">#{{$transaction->id}}</a></td>
                                <td><i class="fa fa-user" aria-hidden="true"></i> ({{ isset($transaction->user->name) ? $transaction->user->name : '[N\A]' }})</td>
                                <td> 
                                    <ul style="list-style-type:none;" class="list-group" style="padding-left: 15px">
                                        <li> {{$transaction->tr_phone}}</li>
                                    </ul>
                                </td>                           
                                <td> {{number_format($transaction->tr_total,0,',','.')}} đ</td>
                                <td> 
                                    @if($transaction->tr_status == 1)  
                                        <a href="#" class="label-success label"><i class="fas fa-check-circle"></i> Đã xử lý</a>
                                    @else
                                    <a href="{{route('admin.get.active.transaction',$transaction->id)}}" class="label-danger label"><i class="fas fa-exclamation-triangle"></i> Chưa xử lý</a>
                                     @endif
                                </td>                            
                                <td> {{$transaction->created_at->format('d-m-Y') }}</td>                
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div> 
    </div>
    {{-- Show danh sách liên hệ --}}
    <div class="row">
        <div class="col-sm-6">
            <h2 class="sub-header">Danh sách liên hệ mới nhất</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tiêu đề</th>
                            <th>Họ tên</th>                    
                             <th>Nội dung</th>
                            <th>Trạng thái</th>
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
                                <td>{{$contact->ct_content}}</td>
                                <td>
                                    @if ($contact->ct_status == 1)
                                    <span class="label label-success">Đã xử lý</span>
                                    @else 
                                        <span class="label label-warning">Chưa xử lý</span>
                                    @endif
                                </td>                                
                            </tr>  
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-6">
            <h2 class="sub-header">Danh sách đánh giá mới nhất</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Người đánh giá</th>
                            <th>Tên sản phẩm</th>
                            <th>Số sao</th>                        
                        </tr>
                    </thead>
                    <tbody>
                       
                        @if(isset($ratings))
                            @foreach ($ratings as $rating)
                            {{-- {{ dd($ratings)}} --}}
                            <tr>
                                <td>{{$rating->id}}</td>                 
                                <td>{{ $rating->user->name ? $rating->user->name : '[N\A]'}}</td>
                                <td><a href="">{{ $rating->product->pro_name ? $rating->product->pro_name : '[N\A]'}}</a></td>
                                <td>{{$rating->ra_number}} <i class="fa fa-star" style= "color: #ff9705"></i></td>                              
                            </tr>  
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div>
        
    </div>
@endsection
 
@section('script')
    <script>   
        // Create the chart
        let data = "{{$dataMoney}}";

        dataChart = JSON.parse(data.replace(/&quot;/g,'"'));

        // console.log(dataChart);

        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Cửa hàng thiết bị công nghệ IOT'
            },
            subtitle: {
                text: '<a href="http://store.com" target="_blank">store.com</a>'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Mức độ tăng trưởng doanh thu'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        // Đơn vị
                        format: '{point.y:.1f} VNĐ'
                        
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:14px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.1f} VNĐ</b><br/>'
            },

            series: [
                {
                    name: "Tổng tiền",
                    colorByPoint: true,
                    data: [
                        {
                            name: "Doanh thu ngày",
                            y: {{(int)$moneyDay }},
                            
                        },
                        {
                            name: "Doanh thu tháng",
                            y: {{ (int)$moneyMonth }},
                            
                        },
                        {
                            name: "Doanh thu trong năm",
                            y: {{ (int)$moneyYear }},
                            
                        },
                    ]
                }
            ]
           
        });
    </script>

@endsection
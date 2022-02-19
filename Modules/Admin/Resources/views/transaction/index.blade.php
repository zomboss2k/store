@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Đơn hàng</a></li>
            <li class="active">Danh sách đơn hàng</li>   
        </ol>
    </div>
    <div class="table-responsive">
            <h2 class="page-header">Quản lý đơn hàng </h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Mã ĐH</th>
                        <th>Mã KH</th>
                        <th>Tài khoản</th>
                        <th>Thông tin</th>
                        <th>Tổng tiền</th>
                        <th>Tình trạng</th>                      
                        <th>Thời gian</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{dd( $transactions)}} --}}
                        <?php $stt = 1 ?>
                        @foreach($transactions as $transaction)
                            <tr>
                            <td>0{{$stt}}0{{$transaction->id}}</td>
                                <td>KH{{$transaction->tr_user_id}}</td>
                                {{-- Lấy tên user --}}
                                <td><i class="fa fa-user" aria-hidden="true"></i> ({{ isset($transaction->user->name) ? $transaction->user->name : '[N\A]' }})</td>
                                <td> 
                                    <ul style="list-style-type:none;" class="list-group" style="padding-left: 15px">
                                        <li><i class="far fa-address-card"></i> {{$transaction->tr_name}}</li>
                                        <li><i class="fas fa-phone-volume"></i></i> {{$transaction->tr_phone}}</li>
                                        <li> <i class="fas fa-route"></i> {{$transaction->tr_address}}</li>
                                        <li> " {{$transaction->tr_note}} "</li>
                                    </ul>
                                </td>                           
                                <td> {{number_format($transaction->tr_total,0,',','.')}} đ</td>
                                {{-- trạng thái --}}
                                <td> 
                                    @if($transaction->tr_status == 1)  
                                        <a href="#" class="label-success label"><i class="fas fa-check-circle"></i> Đã xử lý</a>
                                    @else
                                    <a href="{{route('admin.get.active.transaction',$transaction->id)}}" class="label-danger label"><i class="fas fa-exclamation-triangle"></i> Chưa xử lý</a>
                                     @endif
                                </td>                            
                                    <td> {{$transaction->created_at->format('d-m-Y') }}</td>
                                <td>
                                    {{-- xoa, xem transaction --}}
                                <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 14px" class="btn_customer_action" href="{{route('admin.get.action.transaction',['delete',$transaction->id]) }}"><i class="fas fa-trash-alt"></i></a>
                                    <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 14px" class="btn_customer_action js_order_item" data-id="{{$transaction->id}}" data-total="{{$transaction->tr_total}}" href="{{route('admin.get.view.order',[$transaction->id,$transaction->tr_total])}}"><i class="fas fa-eye"></i></a>
                                </td>                     
                            </tr>
                            <?php $stt++ ?>
                        @endforeach
                </tbody>
            </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModalOrder" role="dialog">
        <div class="modal-dialog modal-lg">
        <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Chi tiết mã đơn hàng: [ <b>#<a href=""class="transaction_id"></a></b> ] </h4>
                </div>
                <div class="modal-body" id="md_content">
                {{-- append --}}
                </div>
                <div class="modal-footer ">
                      <h4 class="modal-title"> <b>TỔNG TIỀN:</b> <span class="transaction_total"></span> <a href="">đ</a></h4>
                </div>
            </div>
        </div>
    </div>
@stop

{{--Bắt sự kiện khi ấn vào xem  --}}
@section('script')
 <script>
    //  ajax show don hang
     $(function(){
         $(".js_order_item").click(function(event){
            //  không cho load lại trang
            event.preventDefault();
            // Khai báo con trỏ this
            let $this = $(this); 
            // lấy đường dẫn route gửi đi
            let url = $this.attr('href');
            $('#md_content').html('');

            // lấy mã đơn hàng
            $(".transaction_id").text('').text($this.attr('data-id'));
            // lấy tổng tiền
            $(".transaction_total").text('').text($this.attr('data-total'));

            $("#myModalOrder").modal('show');
                // console.log(url);
            $.ajax({
               url:url,
            }).done(function(result){
                // console.log(result);
                if(result)
                {
                    $('#md_content').append(result);
                }
            });
         });
     })
 </script>

@endsection




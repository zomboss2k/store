@if($orders)
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>SL</th>
                <th>Giảm giá </th>
                <th>Thành tiền</th>
               </tr>
        </thead>
        <tbody>
            <?php $i=1 ?>
            @foreach($orders as $key=>$order)
                {{-- {{dd($product)}} ; --}}
                {{-- {{dd($key)}} ; --}}
                <tr> 
                    <td>{{$i}}</td>
                    <td><a href="{{route('get.detail.product',[str_slug($order->product->pro_name), $order->or_product_id])}}" target="_blank">{{isset($order->product->pro_name) ? $order->product->pro_name :''}}</a></td>
                    <td><img style="width: 80px; height: 60px" src="{{isset($order->product->pro_avatar) ? pare_url_file($order->product->pro_avatar) :''}}" alt=""></td>
                    <td>{{number_format($order->or_price,0,',','.')}} <a href="">đ</a></td>
                    <td> <b>x{{$order->or_qty}}</b> </td>
                    <td><span style="color: red;">-{{$order->or_sale}} %</span> </td>
                    {{-- giá --}}
                    <td>{{number_format($order->or_qty * ($order->or_price -( $order->or_price * ($order->or_sale/100)) ) ,0,',','.')}} <a href="">đ</a></td>
                </tr>
             <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
@endif
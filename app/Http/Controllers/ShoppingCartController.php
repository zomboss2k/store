<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class ShoppingCartController extends FrontendController
{
    public function __construct()
    {
        parent:: __construct();
    }
    // Thêm sản phẩm vào giỏ hàng
    public function addProduct(Request $request, $id)
    {
        // dd($id);
        // Lấy id sản phẩm muốn mua vào cart
        $product = Product::select('pro_name', 'id', 'pro_price', 'pro_sale', 'pro_avatar','pro_number')->find($id);
        if (!$product) return redirect('/'); // ve home
        // thay đổi giá khi có khuyến mãi
        $price = $product->pro_price;
        if ($product->pro_sale) {
            $price =  $price * (100 - $product->pro_sale)/100;
        }
        // dd($product->pro_number)  ;
        // Kiểm tra số lượng sản phẩm
        if ($product->pro_number == 0 )
        {
            return redirect()->back()->with('warning','Sản phẩm đã hết hàng, vui lòng chọn sản phẩm khác.');
        }
        Cart::add([
            'id' => $id,
            'name' => $product->pro_name,
            'qty' => 1,
            'price' => $price,
            'options' => [
                'avatar' => $product->pro_avatar,
                'sale' => $product->pro_sale,
                'price_old' => $product->pro_price
            ]
        ]);
        return redirect()->back()->with('success','Thêm vào giỏ hàng thành công.');
    }
    // Xoa san pham trong gio hang theo key
    public function deleteProductItem($key)
    {
        Cart::remove($key);
        return redirect()->back()->with('success','Sản phẩm đã xóa khỏi giỏ hàng của bạn.');
    }

    // Danh sách giỏ hàng
    public function getListShoppingCart()
    {
        $products =  Cart::content();
        return view('shopping.index', compact('products'));
    }
    // Form thanh toan
    public function getFormPay()
    {
        // dd('ok');
        $products =  Cart::content();
        return view('shopping.pay', compact('products'));
    }

    // Luu thong tin gio hang
    public function saveInforShoppingCart(Request $request)
    {
        // dd($request->all());
        // Xử lý dấu "," -> ' '
        $totalMoney = str_replace(',','', Cart::subtotal(0,3));
        // dd( $totalMoney);
        $transactionId = Transaction::insertGetId([
            'tr_user_id' => get_data_user('web'),
            'tr_total' => (int) $totalMoney,
            'tr_note' => $request->note,
            'tr_address' =>  $request->address,
            'tr_phone' =>  $request->phone,
            'tr_name' =>  $request->name,
            'tr_city' =>  $request->city,
            'created_at' => Carbon::now(), // thoi gian
            'updated_at' => Carbon::now()
            
        ]);
        //  Kiểm tra lưu đơn hàng
        if ($transactionId) {
            // Sau khi lưu thành công, lấy thông tin đơn hàng lưu vào chi tiết đơn hàng Order
            $products =  Cart::content();
            foreach ($products as $product) {
                // luu vao chi tiet don hang
                Order::insert([
                    'or_transaction_id' => $transactionId,
                    'or_product_id' => $product->id, 
                    'or_qty' => $product->qty,
                    'or_price' => $product->options->price_old,
                    'or_sale' => $product->options->sale,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }
        // Thanh toan xong thì xóa giỏ hàng
        Cart::destroy();
        return redirect()->route('home')->with('info','Bạn đã mua hàng thành công.');
    }
}

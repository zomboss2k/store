<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    // Lay danh sach don hang 
    public function index()
    {
        // phan trang
        $transactions = Transaction::with('user:id,name')-> paginate(10);
        
        $viewData = [
                'transactions'=>$transactions
        ];
        return view('admin::transaction.index', $viewData);
    }
    // Ajax
    // Lay ra du lieu tra ve order 
    public function viewOrder(Request $request, $id)
    {
        
         if ($request->ajax())
         {
             $orders = Order::with('product')-> where('or_transaction_id',$id)->get();
            //  gọi view
             $html = view('admin::components.order', compact('orders'))->render();
             return \response()->json ($html);
         }   
    }
    // Xử lý trạng thái đơn đơn hàng
    public function actionTransaction ($id)
    {
        $transaction = Transaction::find($id);
        // dd( $transaction );
        $orders = Order::where('or_transaction_id', $id)->get();
        // dd($orders);
        if($orders)
        {
           
           
            foreach ($orders as $order)
            {
                // dd($order);
                $product = Product::find($order->or_product_id);
                 // trừ đi số lượng của sản phẩm
                $product->pro_number = $product->pro_number - $order->or_qty;
                 //  Tăng biến pay của sản phẩm lên 1 đơn vị
                $product->pro_pay++;
                $product->save();
            }            
        }
        // Cập nhật bảng User
        \DB::table('users')->where('id',$transaction->tr_user_id)->increment('total_pay');
        

        // cập nhật lại trạng thái đơn hàng
         $transaction->tr_status = Transaction:: STATUS_DONE;
         $transaction->save();
         return redirect()->back()->with('success','Xử lý đơn hàng thành công.');
        //  xử lý trường hợp mua 4 sản phẩm, số lượng sản phẩm 2 ...
        }

        
    // Xóa đơn hàng hh
    public function action($action, $id)
    {
        if ($action) {
            $transaction = Transaction::find($id);
            switch ($action) {
                case 'delete':
                    $transaction->delete();
                    break;
            }
            return redirect()->back();
        }
    }




}

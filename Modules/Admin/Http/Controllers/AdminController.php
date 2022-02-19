<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Contact;
use App\Models\Rating;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {   // show đánh giá mới nhất
        $ratings = Rating::with('user:id,name', 'product:id,pro_name')->limit(5)->get();
        $contacts = Contact::limit(5)->get();

        // show biểu đồ doanh thu
        // Doanh thu ngày
        $moneyDay = Transaction::whereDay('updated_at',date('d'))
        ->where('tr_status',Transaction::STATUS_DONE)
        ->sum('tr_total');
        // Doanh thu tháng
        $moneyMonth = Transaction::whereMonth('updated_at',date('m'))
        ->where('tr_status',Transaction::STATUS_DONE)
        ->sum('tr_total');
        // Doanh thu tháng
        $moneyYear = Transaction::whereYear('updated_at',date('Y'))
        ->where('tr_status',Transaction::STATUS_DONE)
        ->sum('tr_total');
       
        $dataMoney = [
            [ 
                "name" => "Doanh thu ngày",
                "y" => (int)$moneyDay
            ],
            [ 
                "name" => "Doanh thu tháng",
                "y" => (int)$moneyMonth
            ],
            [ 
                "name" => "Tổng doanh thu trong năm",
                "y" => (int)$moneyYear
            ],
        ];

        // show danh sách đơn hàng mới
        $transactionNews = Transaction::with('user:id,name')
        ->limit(6)->orderByDesc('id')->get();

        //  Dữ liệu truyền
        $viewData = [
            'ratings'=>$ratings,
            'contacts'=>$contacts,
            'moneyDay'=>$moneyDay,
            'moneyMonth'=>$moneyMonth,
            'moneyYear'=>$moneyYear,
            'dataMoney'=>json_encode($dataMoney),
            'transactionNews'=> $transactionNews
        ];
        return view('admin::index',$viewData);
    }
}

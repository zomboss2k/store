<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        // lấy theo quan hệ trong Model Rating     
        $ratings = Rating::with('user:id,name', 'product:id,pro_name')->paginate(10);


        $viewData = [
            'ratings' => $ratings
        ];
        return view('admin::rating.index', $viewData);
    }

    // xóa đánh giá
    public function action( Request $request, $action, $id)
    {
        if ($action) {
            $thongbao = "";
            $rating = Rating::find($id);
            switch ($action) {
                case 'delete':
                    $rating->delete();
                    $thongbao = "Đánh giá đã được loại bỏ";
                    break;
            }
            return redirect()->back()->with('success',$thongbao);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends FrontendController
{
    public function  __construct()
    {
        parent::__construct();
    }
    public function productDetail(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i', $url);
        if ($id = array_pop($url)) {

            $productDetail = Product::where('pro_active', Product::STATUS_PUBLIC)->find($id);

            $cateProduct = Category::find($productDetail->pro_category_id);

            // Show danh nguoi danh gia
            $ratings = Rating::with('user:id,name')
                ->where('ra_product_id', $id)
                ->orderBy('id', "DESC")
                ->paginate(10);

            // Gom tổng các đánh giá theo tung san pham
            // Tính tổng ở sản phẩm có bao nhiêu lượt đánh giá, nhóm lại bao nhiêu đanh gia 1 sao, 2 sao

            // $ratingsDashboard = Rating::groupBy('ra_number')
            //     ->where('ra_product_id', $id)
            //     ->select(DB::raw('count(ra_number) as total'),DB::raw('sum(ra_number as sum'))
            //     ->addSelect('ra_number')
            //     ->get()->toArray();
            // // dd($ratingsDashboard);
            // $arrayRatings = [];

            // if (!empty($ratingsDashboard)) {
            //     for ($i = 1; $i <= 5; $i++) {
            //         $arrayRatings[$i] = [];
            //         foreach ($ratingsDashboard as $item) {
            //             if ($item['ra_number'] == $i) {
            //                 $arrayRatings[$i] == $item;
            //                 continue;
            //             }
            //         }
            //     }
            // }

            $viewData = [
                'productDetail' => $productDetail,
                'cateProduct'   => $cateProduct,
                'ratings' => $ratings
            ];
            // dd($productDetail);
        }
        return view('product.detail', $viewData);
    }
}

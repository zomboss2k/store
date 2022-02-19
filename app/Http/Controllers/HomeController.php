<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // Lấy sản phẩm hot ra 
        // public moi lay
        $productHot = Product::where([
            'pro_hot' => Product::HOT_ON,
            'pro_active' => Product::STATUS_PUBLIC
        ])->limit(10)->get();

        // Hiện thị bài viết mới nhất ra trang chủ, c_home = 1
        $articleNews = Article::where('a_active', Article::HOT)->orderBy('id', 'DESC')->limit(6)->get();

        // giới hạn các danhc muc 3
        $categoriesHome = Category::with('products')->where('c_home', Category::HOME_ON)->limit(6)->get();

        // dd($categories);

        $viewData = [
            'productHot' => $productHot,
            'articleNews' =>   $articleNews,
            'categoriesHome' =>  $categoriesHome
        ];
        // dd("OK");
        return view('home.index', $viewData);
    }
    // Xử lý show sản phẩm đã xem 
    public function renderProductView(Request $request)
    {
        if($request->ajax())
        {
            $listID = $request->id;
            $products = Product::whereIn('id',$listID)->limit(8)->get();
            $html = view ('components.product_view',compact('products'))->render();
            
            return response()->json(['data'=> $html]);
        }

    }
}

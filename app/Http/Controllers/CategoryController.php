<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends FrontendController
{
    // 
    public function  __construct()
    {
        parent::__construct();
    }
    // 
    public function getListProduct(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i', $url);

        if ($id = array_pop($url)) {
            $products = Product::where([
                'pro_category_id' => $id,
                'pro_active' => Product::STATUS_PUBLIC
            ]);
            // lọc theo giá
            // lấy tham số price trên url
            if ($request->price) {
                // dd($request->price);
                $price = $request->price;
                switch ($price) {
                    case '1':
                        $products->where('pro_price', '<', 1000000);
                        break;
                    case '2':
                        $products->whereBetween('pro_price', [1000000, 3000000]);
                        break;
                    case '3':
                        $products->whereBetween('pro_price', [3000000, 5000000]);
                        break;
                    case '4':
                        $products->whereBetween('pro_price', [5000000, 7000000]);
                        break;
                    case '5':
                        $products->whereBetween('pro_price', [7000000, 10000000]);
                        break;
                    case '6':
                        $products->where('pro_price', '>', 1000000);
                        break;
                }
            }

            // Lấy tham số submit form_order url
            if ($request->orderby) {
                $orderby = $request->orderby;
                // id tăng dần khi thêm sản phẩm
                switch ($orderby) {
                    case 'desc':
                        // mới nhất
                        $products->orderby('id', 'DESC');
                    break;

                    case 'asc':
                        $products->orderby('id', 'ASC');
                    break;
                    
                    case 'price_max':
                        $products->orderby('pro_price', 'ASC');
                    break;
                   
                    case 'price_min':
                        // giảm dần
                        $products->orderby('pro_price', 'DESC');
                    break;
                    default:
                        $products->orderby('id','DESC');                    
                }
            }

            $products = $products->paginate(9);

            $cateProduct =  Category::find($id);
            $viewData = [
                'products' => $products,
                'cateProduct' => $cateProduct

            ];
            return view('product.index', $viewData);
        }
        // dd($url);
        return redirect('/');
    }
}

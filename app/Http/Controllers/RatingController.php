<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    
    public function saveRating (Request $request,$id)
    {

        // kiểm tra tồn tại request ajax
        if($request->ajax())
        {
            // thêm dữ liệu đánh giá
            Rating::insert([
                    'ra_product_id'=>$id,
                    'ra_number'=> $request->number,
                    'ra_content' => $request->r_content,
                    'ra_user_id'=> get_data_user('web'),
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
            ]);
        }

        // sau khi chèn 
        $product = Product::find($id);
        // cộng dồn đánh giá
        $product->pro_total_number += $request->number; 
        // đếm số lượt đanh gia
        $product->pro_total_rating+=1;
        $product->save();
        return response()->json(['code'=>'1']);
    }
}

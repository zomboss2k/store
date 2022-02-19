<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendController extends Controller
{   
    // Hàm show ra danh mục sản phẩm trên menu
    public function __construct()
    {
        $categories = Category::all();
        View()->share('categories',  $categories);
    }
}

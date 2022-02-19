<?php

namespace App\Http\Controllers;

use App\Models\PageStatic;
use Illuminate\Http\Request;

class PageStaticController extends FrontendController
{

    public function __construct()
    {
        parent::__construct();
    }

    // về chúng tôi
    public function aboutUs()
    {
        
        $page = PageStatic::where('ps_type', PageStatic::TYPE_ABOUT)->first();
       
        return view('page_static.about', compact('page'));

    }
    // Thông tin giao hàng
    public function shipmentDetails()
    {
        
        $page = PageStatic::where('ps_type', PageStatic::TYPE_INFO_SHOPING)->first();
       
        return view('page_static.about', compact('page'));

    }
    // Các chính sách bảo mật
    public function privacyPolicy()
    {
        
        $page = PageStatic::where('ps_type', PageStatic::TYPE_BAOMAT)->first();
       
        return view('page_static.about', compact('page'));

    }
     // Điều khoản sử dụng
     public function termsOfUse()
     {
         
         $page = PageStatic::where('ps_type', PageStatic::TYPE_DIEUKHOAN)->first();
        
         return view('page_static.about', compact('page'));
 
     }

}

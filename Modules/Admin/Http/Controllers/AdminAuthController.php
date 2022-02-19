<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    //  Đăng nhập Admin
    public function getLogin()
    {
        return view('admin::auth.login');
    }

    // Đăng nhập
    //  lấy dữ liệu post từ login admin xử lý
    public function postLogin(Request $request)
    {
        // dd($request->all());
        //  only chỉ lấy 2 trường email và passwrd, ko lay token
        $data = $request->only('email', 'password');
        // login
        if (Auth::guard('admins')->attempt($data)) {
            //  thanh cong
            return redirect()->route('admin.home');
        }        
            // that bai
        return redirect()->back();
    }
    // Đăng xuất admin
    public function logoutAdmin()
    {
        Auth::guard('admins')->logout();
        return redirect()->route('admin.login');
    }




}

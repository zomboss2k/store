<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        // dd($request->all());
        // thông tin đăng nhập : chỉ lấy email và mật khẩu 
        $credentials = $request->only('email','password');
        if(\Auth::attempt( $credentials)){
            return redirect()->route('home');
        }
    }
    //Dang xuat
    public function getLogout(){
        \Auth::logout();
        return redirect()->route('home');
    }

}

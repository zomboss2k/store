<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public function getRegister()
    {
        return view('auth.register');
    }
    public function postRegister(Request $request)
    {
        // dd($request->all());
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        // Mã hóa mật khẩu theo laravel bcrypt
        $user->password = bcrypt($request->password);
        $user->save();
        // kiểm tra nếu tồn tại user id -> tra về trag route login, ko thì về chính trang củ

        if ($user->id) {
            return redirect()->route('get.login');
        }
        return redirect()->back();
    }
}

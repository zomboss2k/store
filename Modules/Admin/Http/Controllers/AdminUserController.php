<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminUserController extends Controller
{
    public function index( Request $request)
    {   
        // load tat ca user ra
        $users = User::whereRaw(1);
        $users = $users->orderBy('id','DESC')->paginate(10);
        $viewData = [
            'users'=> $users
        ];
        return view('admin::user.index',$viewData);

    }

    // xóa đánh user
    // public function deleteUser( Request $request, $delete, $id)
    // {
    //     if ($delete) {
    //         $user = User::find($id);
    //         switch ($delete) {
    //             case 'delete':
    //                 $user->delete();
    //                 break;
    //         }
    //         return redirect()->back();
    //     }
    // }

    
}

<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends FrontendController
{
    // 
    public function  __construct()
    {
        parent::__construct();
    }
    //
    public function getContact()
    {
        return view('contact');
    }
    // luu thong tin nhap tu contact
    public function saveContact(Request $request)
    {
        // dd($request->all());
        $data = $request->except('_token');
        // add thoi gian
        $data['created_at'] = $data['updated_at'] = Carbon::now();
        Contact::insert($data);
        return redirect()->back();
    }
}

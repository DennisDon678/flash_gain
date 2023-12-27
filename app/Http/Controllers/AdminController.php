<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function users_list()
    {
        return view('admin.users');
    }

    public function userinfo(Request $request){
        $user = User::where('id','=',$request->user)->first();
        return view('admin.user',compact('user'));
    }
}

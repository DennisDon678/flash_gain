<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $validator = $request->validate([
            'email' => 'unique:users,email|email',
            'username' => 'unique:users,name',

        ]);

        $referral_id = 'USER-'.Str::random(5).date('m');
        $refered = null;
        if (!empty($request->refered)){
            $refered = $request->refered;
        }

        $input = [
            'email' => $request->email,
            'name' => $request->username,
            'referral_id' => $referral_id,
            'referred_by' => $request->refered,
            'password' => $request->password,
        ];

        if (User::create($input)){
            $input = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            Auth::attempt($input);
            return redirect('/my_wallet');
        }
    }

    public function login(Request $request)
    {
        $input = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($input)){
            return redirect('/my_wallet');
        }else {
            return redirect()->back()->with('error','Invalid Credentials');
        }
    }

    public function admin_login(Request $request){
        $input = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('admin')->attempt($input)){
            return redirect('/admin');
        }else {
            return redirect()->back()->with('error','Invalid Credentials');
        }
    }
}

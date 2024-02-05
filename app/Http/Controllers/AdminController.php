<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function approve(Request $request) {
        $pending = Withdrawal::where('id','=',$request->id)->first();

        $pending->status = 'approved';
        $pending->save();

        return redirect()->back();
    }

    public function reject(Request $request){
        $pending = Withdrawal::where('id','=',$request->id)->first();

        $pending->status = 'rejected';
        $pending->save();

        // Refund User
        $user = User::where('id','=',$pending->user)->first();
        $bal = $pending->balance.'_bal';
        $user->$bal = $user->$bal + $pending->amount;
        $user->save();

        return redirect()->back();
    }

    public function coupon()
    {
        return view('admin.coupon');
    }

    public function generate_coupon(Request $request) {
        $amount = $request->amount;
        $coupon = 'coup_'.Str::random(16).'_'.time();

        $input = [
            'coupon' => $coupon,
            'amount' => $amount,
        ];

        Coupon::create($input);

        return redirect()->back();
    }
}

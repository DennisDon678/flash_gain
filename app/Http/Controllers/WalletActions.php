<?php

namespace App\Http\Controllers;

use App\Models\Active_orders;
use App\Models\Active_reward;
use App\Models\Deposit;
use App\Models\Orders;
use App\Models\Paystack;
use App\Models\Rank;
use App\Models\User;
use App\Models\Withdrawal;
use App\Models\withdrawal_account;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class WalletActions extends Controller
{
    //
    public function wallet()
    {
        return view('wallet.my_wallet');
    }

    public function profile()
    {
        return view('wallet.profile');
    }

    public function order()
    {
        return view('wallet.order');
    }

    public function reward()
    {
        return view('wallet.reward');
    }

    public function setting()
    {
        return view('wallet.setting');
    }

    public function team()
    {
        return view('wallet.team');
    }

    public function about()
    {
        return view('wallet.about');
    }

    public function allpay()
    {
        return view('wallet.allpay');
    }

    public function mlmpay()
    {
        return view('wallet.mlmpay');
    }

    public function orderpay()
    {
        return view('wallet.orderpay');
    }

    public function withdraw()
    {
        if (empty(withdrawal_account::where('user', '=', Auth::user()->id)->first())) {
            return redirect('/setting');
        }
        return view('wallet.withdraw');
    }

    public function history_withdr()
    {
        return view('wallet.history-withdr');
    }

    public function history_recha()
    {
        return view('wallet.history-recha');
    }

    public function process_orderpay(Request $request)
    {
        $paystack = Paystack::first();
        $reference = Str::random(12);

        $input = [
            'user' => Auth::user()->id,
            'type' => 'order_pay',
            'trans_id' => $reference,
            'amount' => $request->amount,
            'status' => 'pending',
        ];
        Deposit::create($input);

        $response = Http::withHeaders(
            [
                "Authorization" => "Bearer " . $paystack->secret,
                "Cache-Control" => "no-cache",
            ]
        )->post(
            'https://api.paystack.co/transaction/initialize',
            [
                'email' => Auth::user()->email,
                'amount' => $request->amount * 100,
                'callback_url' => env('APP_URL') . "/verify_transaction",
                'reference' => $reference,
            ]
        )->json();

        return redirect($response['data']['authorization_url']);
    }

    public function verify_transaction(Request $request)
    {
        $paystack = Paystack::first();
        $response = Http::withHeaders([
            "Authorization" => "Bearer " . $paystack->secret,
        ])->get('https://api.paystack.co/transaction/verify/' . $request->reference)->json();

        $trn = $response['data']['reference'];
        $funding = Deposit::where('trans_id', '=', $trn)->first();
        if ($response['data']['status'] == 'success') {
            $funding->status = $response['data']['status'];
            $funding->save();

            $user = User::where('id', '=', $funding->user)->first();
            if ($funding->type == 'order_pay') {
                $user->order_bal = $user->order_bal + $funding->amount;
            } else {
                $user->grow_bal = $user->grow_bal + $funding->amount;
            }

            $user->save();
            return redirect('/my_wallet');
        } else {
            $funding->status = $response['data']['status'];
            $funding->save();
            return redirect('/my_wallet');
        }
    }

    public function activate_order(Request $request)
    {
        $order = Orders::where('id', '=', $request->id)->first();

        if ($order->amount <= Auth::user()->order_bal) {
            $active = Active_orders::where('user', '=', Auth::user()->id)->where('status', '=', 'on')->get();
            if (!empty($active)) {
                $input = [
                    'user' => Auth::user()->id,
                    'order' => $request->id,
                    'status' => 'on',
                    'expires' => Carbon::now()->addDays($order->days),
                    'earned' => '0'
                ];

                Active_orders::create($input);
                $user = User::where('id', '=', Auth::user()->id)->first();
                $user->order_bal = $user->order_bal - $order->amount;
                $user->save();

                return redirect()->back();
            } else {
                return redirect()->back()->with('message', 'Currently have an active order');
            }
        } else {
            return redirect()->back()->with('message', 'Not Enough Balance');
        }
    }

    public function interest_calculate()
    {
        $orders = Active_orders::where('status', '=', 'on')->get();

        foreach ($orders as $order) {
            if ($order->updated_at != today() and $order->expires >= today() and Carbon::now()->diffInHours($order->updated_at) >= 24) {
                $info = Orders::where('id', '=', $order->order)->first();
                $user = User::where('id', '=', $order->user)->first();

                $user->order_bal = $user->order_bal + $info->daily;
                $order->updated_at = Carbon::now();
                $order->earned = $order->earned + $info->daily;

                if ($order->expires == today()) {
                    $order->status = 'off';
                }
                $user->save();
                $order->save();
            }
        }

        print('Done');
    }

    public function reward_activate()
    {
        return view('wallet.activate_reward');
    }

    public function reward_more()
    {
        return view('wallet.more');
    }

    public function pay_reward(Request $request)
    {
        $rank = Rank::where('id', '=', $request->id)->first();
        return view('wallet.reward_pay', compact('rank'));
    }

    public function process_mlmpay(Request $request)
    {
        $paystack = Paystack::first();
        $reference = Str::random(12);

        $input = [
            'user' => Auth::user()->id,
            'type' => 'grow_pay',
            'trans_id' => $reference,
            'amount' => $request->amount,
            'status' => 'pending',
        ];
        Deposit::create($input);

        $response = Http::withHeaders(
            [
                "Authorization" => "Bearer " . $paystack->secret,
                "Cache-Control" => "no-cache",
            ]
        )->post(
            'https://api.paystack.co/transaction/initialize',
            [
                'email' => Auth::user()->email,
                'amount' => $request->amount * 100,
                'callback_url' => env('APP_URL') . "/verify_transaction",
                'reference' => $reference,
            ]
        )->json();

        return redirect($response['data']['authorization_url']);
    }

    public function reward_process(Request $request)
    {
        if ($request->amount <= Auth::user()->grow_bal) {
            $user = User::where('id', '=', Auth::user()->id)->first();


            // Create User reward
            if (!empty($active = Active_reward::where('user', '=', Auth::user()->id)->where('rank', '=', $request->id)->first())) {
                if ($active->team != 10 and $active->team != 20 and $active->team != 30 and $active->team != 40 and $active->team != 50) {
                    return redirect()->back()->with('message', 'Incomplete round found. Complete round ' . $active->round . ' to continue.');
                } else {
                    $round = $active->round + 1;
                    if ($round <= 5) {
                        $active->round = $round;
                        $active->save();
                    }
                }
            } else {
                if ($request->id != 1) {
                    if (!empty($prev = Active_reward::where('user', '=', Auth::user()->id)->where('rank', '=', $request->id - 1)->first())) {
                        if ($prev->team != 10 and $prev->team != 20 and $prev->team != 30 and $prev->team != 40 and $prev->team and 50) {
                            return redirect()->back()->with('message', 'Incomplete circle found. Complete rank ' . $request->id - 1 . ' to continue.');
                        }
                    }
                }
                $round = 1;
                $input = [
                    'user' => Auth::user()->id,
                    'rank' => $request->id,
                    'round' => $round,
                    'team' => 0,
                ];
                Active_reward::create($input);
            }

            if ($round <= 5) {
                // Debit User
                $user->grow_bal = $user->grow_bal - $request->amount;

                // Check referre
                $referee = $user->referred_by;
                if ($referee != null) {
                    $uplink = User::where('referral_id', '=', $referee)->first();

                    $upline_reward = Active_reward::where('user', '=', $uplink->id)->where('rank', '=', $request->id)->first();
                    if (!empty($upline_reward)) {

                        if ($upline_reward->round <= 5) {

                            if ($upline_reward->status == 'on') {

                                $upline_reward->team = $upline_reward->team + 1;

                                // off
                                if ($upline_reward->team == 10 or $upline_reward->team == 20 or $upline_reward->team == 30 or $upline_reward->team == 40 or $upline_reward->team == 50) {
                                    $upline_reward->status = 'off';
                                }
                                $upline_reward->save();

                                // Rank finance
                                $rank = Rank::where('id', '=', $request->id)->first();
                                $uplink->grow_bal = $uplink->grow_bal + $rank->earn;
                                $uplink->save();
                            }
                        }
                    }

                    $user->save();
                    return redirect('/reward');
                }
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('/mlmpay');
        }
    }

    public function update_bank(Request $request)
    {
        $acc = withdrawal_account::where('user', '=', Auth::user()->id)->first();

        if ($acc == null) {
            $input = [
                'account_name' => $request->Aname,
                'user' => Auth::user()->id,
                'bank_account' => $request->Anumber,
                'bank_name' => $request->bname,
            ];

            withdrawal_account::create($input);
        } else {
            $acc->account_name = $request->Aname;
            $acc->bank_account    = $request->Anumber;
            $acc->bank_name = $request->bname;
            $acc->save();
        }

        return redirect()->back();
    }

    public function process_withdrawal(Request $request)
    {
        $bal = $request->balance . '_bal';
        if ($request->amount <= Auth::user()->$bal) {
            $input = [
                'user' => Auth::user()->id,
                'balance' => $request->balance,
                'amount' => $request->amount,
            ];

            Withdrawal::create($input);

            // $user
            $user = User::where('id', '=', Auth::user()->id)->first();

            $user->$bal = $user->$bal - $request->amount;
            $user->save();

            return redirect('/my_wallet');
        } else {
            return redirect()->back();
        }
    }

    public function update_password(Request $request)
    {

        if ($request->pass != $request->new_pass) {
            if (password_verify($request->pass, Auth::user()->password)) {
                $user = User::where('id', '=', Auth::user()->id)->first();
                $user->password = $request->new_pass;
                $user->save();

                return redirect()->back()->with('message', 'Password Changed.');
            } else {
                return redirect()->back()->with('error', 'Old password did not match.');
            }
        } else {
            return redirect()->back()->with('error', 'New password should be different from the old one.');
        }
    }
}

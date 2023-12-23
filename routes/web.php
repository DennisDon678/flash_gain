<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WalletActions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('wallet.home');
});
Route::get('/orders/interest',[WalletActions::class,'interest_calculate']);

// Auth Routes
Route::get('/login', function () {
    return view('wallet.login');
})->name('login');
Route::get('/register', function () {
    return view('wallet.register');
});

// AuthCOntolls
Route::post('/register', [AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);


// Wallets Route
Route::middleware('auth')->controller(WalletActions::class)->group(function () {
    Route::get('/my_wallet', 'wallet');
    Route::get('/profile', 'profile');
    Route::get('/order', 'order');
    Route::get('/reward', 'reward');
    Route::get('/setting','setting');
    Route::get('/team','team');
    Route::get('/about','about');
    Route::get('/allpay','allpay');
    Route::get('/mlmpay','mlmpay');
    Route::get('/orderpay','orderpay');
    Route::get('/withdraw','withdraw');
    Route::get('/history-withdr','history_withdr');
    Route::get('/history-recha','history_recha');
    Route::get('/history', function (){
        return redirect('/history-recha');
    });
    Route::post('orderpay','process_orderpay');
    Route::get('/verify_transaction','verify_transaction');
    Route::get('/order/activate','activate_order');
    Route::get('/reward/activate','reward_activate');
    Route::get('/reward/more','reward_more');
    Route::get('/reward/pay','pay_reward');
    Route::post('/mlmpay','process_mlmpay');
    Route::post('/reward/pay','reward_process');
    Route::get('/logout',function(){
        Auth::logout();
        return redirect('/login');
    });
    Route::post('/setting','update_bank');
    Route::post('/withdraw','process_withdrawal');
    Route::post('/setting/password','update_password');
});

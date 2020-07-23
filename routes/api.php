<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', 'Auth\RegisterController@register');
Route::post('payment-success', 'Stripe\PaymentController@success')->name('success');
Route::post('amount', function (Request $request) {
    return response()->json('100');
});

Route::post('payment-confirmed', function (Request $request) {
    $user = User::where('email', $request->email)->first();

    $user->payment_confirmed = true;
    $user->save();
});

Route::get('config', function (Request $request) {
    dd(config('hybridauth.providers.Google'));
});

Route::get('social/login', function (Request $request) {
    return response()->json(Socialite::with('facebook')->userFromToken('' . $request->code));
});

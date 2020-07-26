<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeAuthController@index')->name('welcome')->middleware(['payed', 'verified']);

Route::get('facebook', 'Auth\FacebookAuth@auth')->name('facebook-signup');
Route::get('facebookcallback', 'Auth\FacebookAuth@callback');

Route::get('google', 'Auth\GoogleAuth@auth')->name('google-signup');
Route::get('googlecallback', 'Auth\GoogleAuth@callback');

Route::post('confirm-paypal-payment', 'Payment\PaymentController@confirmPayPal');
Route::post('confirm-stripe-payment', 'Payment\PaymentController@confirmStripe');

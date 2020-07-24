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


Auth::routes();

// Route::post('login', 'Auth\LoginController@login')->name('login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Route::post('register', 'Auth\RegisterController@register')->name('register');

Route::get('/home', 'HomeAuthController@index')->name('welcome');

// Route::post('/social/facebook/signup', 'Auth\FacebookController@register')->name('facebook-signup');
// Route::post('/social/google/signup', 'Auth\GoogleController@register')->name('google-signup');

Route::get('facebook', 'Auth\FacebookAuth@auth')->name('facebook-signup');
Route::get('auth/facebook/callback', 'Auth\FacebookAuth@callback');

Route::get('google', 'Auth\GoogleAuth@auth')->name('google-signup');
Route::get('auth/google/callback', 'Auth\GoogleAuth@callback');

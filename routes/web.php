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

Route::get('facebook', function (Request $request) {
    return Socialite::driver('facebook')->redirect();
})->name('facebook-signup');

Route::get('callback', function (Request $request) {
    $socialUser = Socialite::driver('facebook')->user();

    $user = User::where('provider_id', '=', $socialUser->id)
        ->where('provider', '=', 'facebook')
        ->first();

    if ($user == null) {
        $newUser = new User();

        $newUser->name        = $socialUser->getName();
        $newUser->email       = $socialUser->getEmail() == '' ? '' : $socialUser->getEmail();
        $newUser->password    = '';
        $newUser->provider    = 'facebook';
        $newUser->provider_id = $socialUser->getId();

        $newUser->save();

        $user = $newUser;
    }

    Auth::login($user);

    return redirect('/');
});

Route::get('google', function (Request $request) {
    return Socialite::driver('google')->redirect('home');
})->name('google-signup');

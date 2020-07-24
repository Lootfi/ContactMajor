<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuth extends Controller
{
    public function auth()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $socialUser = Socialite::driver('google')->user();

        $user = User::firstOrCreate([
            'provider_id' => $socialUser->getId(),
            'provider' => 'google'
        ], [
            'name' => $socialUser->getName(),
            'email' => $socialUser->getEmail() == '' ? '' : $socialUser->getEmail(),
            'password' => '',
            'avatar' => $socialUser->getAvatar(),
        ]);
        // Auth::login($user);

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookAuth extends Controller
{
    public function auth()
    {
        //->redirect()->getTargetUrl()
        return Socialite::driver('facebook')->asPopup()->redirect();
    }

    public function callback()
    {
        $socialUser = Socialite::driver('facebook')->user();

        $user = User::firstOrCreate([
            'provider_id' => $socialUser->getId(),
            'provider' => 'facebook'
        ], [
            'name' => $socialUser->getName(),
            'email' => $socialUser->getEmail() == '' ? '' : $socialUser->getEmail(),
            'password' => '',
            'avatar' => $socialUser->getAvatar(),
        ]);

        if ($user->payment_confirmed == true) {
            Auth::login($user);
            return redirect()->route('welcome');
        }

        return redirect('/')->with('email', $user->email);
    }
}

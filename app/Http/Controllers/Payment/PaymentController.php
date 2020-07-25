<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Exceptions\IncompletePayment;

class PaymentController extends Controller
{

    public function confirmPayPal(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        $user->payment_confirmed = true;
        $user->payment_method = "paypal_" . $request->payment_method;
        $user->save();

        Auth::login($user);

        return redirect()->route('welcome');
    }

    public function confirmStripe(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        DB::beginTransaction();
        try {
            $stripeCharge = $user->charge(100, $request->payment_method);

            $user->payment_method = "stripe_" . $request->payment_method;
            $user->payment_confirmed = true;
            $user->save();
            Auth::login($user);

            DB::commit();
            return redirect()->route('welcome');
        } catch (IncompletePayment $exception) {
            DB::rollback();
            //handle payment errors here
            return response()->json(['error' => $exception->getMessage()]);
        }
    }
}

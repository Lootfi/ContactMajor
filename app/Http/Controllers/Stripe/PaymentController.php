<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /*
    *   called from frontend when user registers then starts subscription
    */
    public function success(Request $request)
    {
        return response()->json(['hey' => 'hey']);
    }
}

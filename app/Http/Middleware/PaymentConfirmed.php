<?php

namespace App\Http\Middleware;

use Closure;

class PaymentConfirmed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->payment_confirmed == false) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}

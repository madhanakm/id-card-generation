<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfCustomer {
    public function handle(Request $request, Closure $next) {
        if (Auth::user()['role_id'] == 2) {
            return redirect()->route('notes');
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role!=1) {
            return redirect()->back()->with('mess', 'Bạn không có quyền admin');
        }
        return $next($request);
    }
}

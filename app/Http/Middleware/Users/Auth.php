<?php

namespace App\Http\Middleware\Users;

use Closure;
use Illuminate\Http\Request;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->exists('user')) {
            return redirect('administrator/auth/login');
        }

        return $next($request);
    }
}
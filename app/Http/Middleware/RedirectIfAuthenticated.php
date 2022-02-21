<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /*
     * in this function I put the guard and redirect path as attribures in the function
     * to handle the multiple auth of (users, admins and moderators)
     * */
    public function handle($request, Closure $next, $guard = null, $redirectTo = '/home')
    {
        if (Auth::guard($guard)->check()) {
            return redirect($redirectTo);
        }

        return $next($request);
    }
}

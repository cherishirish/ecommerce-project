<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {

            if(Auth::guard($guard)->check()){
<<<<<<< HEAD
                return redirect(RouteServiceProvider::HOME)->with('success', 'You have logged in');
=======
                return redirect(RouteServiceProvider::HOME);
>>>>>>> aac051ec1f7ebfd0776f3d42b92fa58948e43f14
            }
        }

        return $next($request);
    }
}

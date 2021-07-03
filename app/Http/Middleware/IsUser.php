<?php

namespace App\Http\Middleware;

use Closure;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Auth;

class IsUser
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
        if (Auth::user() && Auth::user()->role == "user") {
            return $next($request);
        }
        return redirect('/dashboard'); // Mettre la route destiné au dashboard de l'admin
    }
}

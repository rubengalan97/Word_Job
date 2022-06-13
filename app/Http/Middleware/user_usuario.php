<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class user_usuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::user()->rol == "empresa") {
            return redirect()->route('empresa.misOfertas');
        }

        if (Auth::user()->rol == "admin") {
            return redirect()->route('admin.gestion');
        }

        if (Auth::user()->rol == "usuario") {
            return $next($request);
        }

        return redirect()->route('login');
    }
}

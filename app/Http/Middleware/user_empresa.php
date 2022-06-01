<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class user_empresa
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
            return $next($request);
        }

        if (Auth::user()->rol == "admin") {
            return redirect()->route('admin.gestion');
        }

        if (Auth::user()->rol == "usuario") {
            return redirect()->route('usuario.ofertas');
        }

        return redirect()->route('login');
    }
}

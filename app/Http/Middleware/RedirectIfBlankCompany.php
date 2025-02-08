<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RedirectIfBlankCompany
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
        if (!Auth::check()) {
            return $next($request);
        }
    
        $empresa = DB::table('empresas')
            ->where('id', Auth::user()->empresa_id)
            ->first();
    
        // Si la empresa no tiene un nombre, redirigir a la página de onboarding
        if (optional($empresa)->name === null) {
            return redirect(RouteServiceProvider::ONBOARDING_PAGE);
        }
    
        return $next($request);
    }
}

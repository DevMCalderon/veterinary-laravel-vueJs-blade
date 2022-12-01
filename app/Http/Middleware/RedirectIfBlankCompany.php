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
        $empresa = DB::table('empresas') 
                            ->where('id',  Auth::user()->empresa_id)
                            ->first();

        if($empresa){
            if( $empresa->nombre=="" || $empresa->state==null ){
                return redirect(RouteServiceProvider::ONBOARDING_PAGE);
            }else{
                return $next($request);
            }
        }else{
            return $next($request);
        }
        
    }
}

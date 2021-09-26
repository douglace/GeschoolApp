<?php

namespace App\Http\Middleware;


use Closure;

class Initialisation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->session()->has('session_id') && $request->session()->has('annee_id')){
            return $next($request);
        }
        return redirect()->route("front.setting.index.session");
        
    }
}

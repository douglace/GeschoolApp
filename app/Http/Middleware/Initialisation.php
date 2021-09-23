<?php

namespace App\Http\Middleware;

use App\AnneeScolaire;
use App\Session;
use Closure;
use Illuminate\Support\Facades\View;

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
        return $next($request);
    }
}

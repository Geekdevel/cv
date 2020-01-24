<?php

namespace App\Http\Middleware;

use Closure;

class CheckProfile
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
        if ( !$request->user()->profile) {
            return redirect('/master/profilecreate');
        }
        elseif ( $request->user()->profile) {
            return redirect('/master/resumeses');
        }
        return $next($request);
    }
}

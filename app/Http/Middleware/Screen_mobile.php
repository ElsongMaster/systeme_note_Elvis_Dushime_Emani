<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Screen_mobile
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
        if(!str_contains(request()->header('user-agent'),'Mobile') ){

            return $next($request);
        }else{
            abort(403);
        }
    }
}

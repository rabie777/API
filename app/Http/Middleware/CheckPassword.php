<?php

namespace App\Http\Middleware;

use Closure;

class CheckPassword
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
if( $request-> api_password !== env('api_password','TLaRF5QezjgY3F42tyAwpwP4rmC'))
      {
        return response()->json(['message'=>'unauthorization']);
      }
        return $next($request);

    }
}

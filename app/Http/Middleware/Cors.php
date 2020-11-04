<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
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
        return $next($request)
        ->header('Access-Control-Allow-Origin','*')
        // Depending of your application you can't use '*'
        // Some security CORS concerns
        //->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods','POST, OPTIONS,GET')
        ->header('Access-Control-Allow-Credentials', 'true')
        ->header('Access-Control-Max-Age', '10000')
        ->header('Access-Control-Allow-Headers', '*');
       }
}

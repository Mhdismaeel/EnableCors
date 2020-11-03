<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Http_log;
class HttpLog
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
        $response= $next($request);

        $log=Http_log::create([
            'uri'=>$request->getUri(),
            'method'=>$request->getMethod(),
            'request_body'=>serialize($request->email),
            'response'=>$response->getContent(),
        ]);

        return $response;

    }
}

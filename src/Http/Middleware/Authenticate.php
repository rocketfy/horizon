<?php

namespace Rocketfy\Horizon\Http\Middleware;

use Rocketfy\Horizon\Horizon;

class Authenticate
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response|null
     */
    public function handle($request, $next)
    {
        return Horizon::check($request) ? $next($request) : abort(403);
    }
}

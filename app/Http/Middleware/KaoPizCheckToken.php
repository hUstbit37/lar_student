<?php

namespace App\Http\Middleware;

use Closure;

class KaoPizCheckToken
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
        if($request->path() !== 'login1'){
            if(!$request->token){
                return redirect('login1');;
            }
        }
        return $next($request);
    }
}
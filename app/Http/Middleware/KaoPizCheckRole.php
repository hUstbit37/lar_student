<?php

namespace App\Http\Middleware;

use Closure;

class KaoPizCheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if($role !== $request->get('role')){
            return redirect('login');
        }
        return $next($request);
    }
}
<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;


use Closure;

class Staff
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
        if (!(Auth::user()->level == 'siswa')) {
            return redirect('/');
        }
        return $next($request);
    }
}

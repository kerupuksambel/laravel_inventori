<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Karyawan
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
        // dd(Auth::user());
        if (Auth::user()->user_role == 'karyawan') {
            return $next($request);
        }
        return redirect('/');
    }
}

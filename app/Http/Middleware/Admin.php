<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Admin
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
        if(!is_null(Auth::user())){
            if (Auth::user()->user_role == 'karyawan') {
                return redirect('karyawan');
            }else if(Auth::user()->user_role == 'admin'){
                return $next($request);
            }else if(Auth::user()->user_role == 'owner'){
                return redirect('owner');
            }
        }else{
            return redirect('login');
        }
    }
}

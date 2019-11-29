<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class SeparateByRole
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
        if (Auth::user()->role == 'student') {
            return redirect('student');
        }
        elseif (Auth::user()->role == 'teacher') {
            return redirect('teacher');
        }
        return redirect('/');
    }
}

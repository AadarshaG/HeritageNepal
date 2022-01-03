<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\User;

class CheckApproval
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
       if (Auth::user()->is_approved =='0') {
            return redirect('approval');
        } 
                 
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class CheckAccount
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
        $user = Auth::user();
        
        if($user->email_verified_at){
            return $next($request);
        }
        return redirect('/verify-account');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $usertype = Auth::user()->usertype;
        // if($usertype == 'employee'){
        //     return redirect("check-in");
        // }
        if(!empty(Auth::user() && (Auth::user()->usertype == 'employee'))){
            return $next($request);
        }
        else{
            return redirect('/');
        }
        return $next($request);
    }
}

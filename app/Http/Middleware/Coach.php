<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Symfony\Component\HttpFoundation\Response;

class Coach
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->role == 1){
                return $next($request);
            }else{
                Auth::logout();
                return redirect(url('login'));
            }


        }else{
            Auth::logout();
            return redirect(url('login'));
            
        }
    }
}
<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

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
        
        if(Auth::check() && $request->user()->isAdmin == 1){
            return redirect()->back();
        }
        else{
            return redirect()->route('login')->with('error',"Only admin can access!");
        }
        
    }
}

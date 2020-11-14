<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\View;

class CartCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        if($request->user()){
            $user_id = Auth::id();
            $countCartItems = Order::where([['user_id',$user_id],['ordered'=>false]])->first();
            View::share('countCartItems', "textign");
            return $next($request);
        }
    }
}

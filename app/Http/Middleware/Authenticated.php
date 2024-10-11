<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$guard = null): Response
    {
        switch ($guard){
            case 'user':
                if (Auth::guard('user')->check()){
                    $users = Auth::guard('user')->user();
                    if ($users->status == 'active'){
                        return redirect()->route('dashboard');
                    }else{
                        $request->session()->invalidate();
                        return redirect()->route('show-login');
                    }
        }
                break;

            case 'customer' :
               if (Auth::guard('customer')->check()){
                   $customers = Auth::guard('customer')->user();
                   if ($customers->status == 'active'){
                       return redirect()->route('dashboard');
                   }else{
                       $request->session()->invalidate();
                       return redirect()->route('show-login');
                   }
               }
               break;
        }
//        return $next($request);
    }

}

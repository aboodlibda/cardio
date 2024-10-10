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
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('user')->check()){
            $users = Auth::guard('user')->user();
            if ($users->status == 'active'){
                return redirect()->route('dashboard');
            }else{
                $request->session()->invalidate();
                return redirect()->route('show-login');
            }

        }else{
            $customers = Auth::guard('customer')->user();
            if ($customers->status == 'active'){
                return redirect()->route('dashboard');
            }else{
                $request->session()->invalidate();
                return redirect()->route('show-login');
            }

        }
        return $next($request);
    }
}

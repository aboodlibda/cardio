<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
    }
    public function showLogin()
    {
        return view('cms.auth.sign-in');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('user')->attempt($credentials)) {
            $user = Auth::guard('user')->user();
            if ($user->status == 'active') {
                return  response()->json([
                    'icon' => 'success',
                    'confirmButtonText' => trans('dashboard_trans.Ok, got it!'),
                    'text' => trans('dashboard_trans.Sign in successfully'),

                ]);
            }else{
                return  response()->json([
                    'icon' => 'warning',
                    'confirmButtonText' => trans('dashboard_trans.Ok, got it!'),
                    'text' => trans('dashboard_trans.This User InActive'),

                ]);
            }
        }else{
            return  response()->json([
                'icon' => 'error',
                'confirmButtonText' => trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Error Credentials!'),

            ]);
        }

    }

    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        return redirect()->route('show-login');

    }
}

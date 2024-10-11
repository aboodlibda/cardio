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
                notify()->success(trans('dashboard_trans.Sign in successfully'));
                return redirect()->route('dashboard');
            } else {
                notify()->error(trans('dashboard_trans.This User InActive'));
                return redirect()->back()->withInput();
            }

        }else{
            notify()->error(trans('dashboard_trans.Error Credentials'));
            return redirect()->back()->withInput();
        }

    }

    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        return redirect()->route('show-login');

    }
}

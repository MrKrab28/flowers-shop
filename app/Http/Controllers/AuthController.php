<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth');
    }

    public function authenticate(Request $request)
    {
        $remember = $request->remember ? true : false;

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            return redirect()->route('admin.dashboard');
        }
        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('index');
        }

        return redirect()->back()->with('error', 'Email atau Password salah');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Auth::logout();

        return redirect()->route('login');
    }
}

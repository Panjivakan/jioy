<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;




class LoginpelangganController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/');
        // }

        if (Auth::guard('pelanggan')->attempt($credentials)) {
            $request->session()->regenerate();
            toast('Selamat datang', 'success');

            return redirect()->intended('/');
        }

        return back()->with('loginnyaError', 'Login Gagal!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;


class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        // }

        return back()->with('loginnyaError', 'Login Gagal!');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        toast('Anda Sudah Logout!', 'success');

        return redirect('/');
    }
}

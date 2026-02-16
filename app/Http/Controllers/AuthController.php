<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Menggunakan method isAdminGereja() yang sudah Anda buat di Model User
            if (Auth::user()->isAdminGereja()) {
                return redirect()->route('jemaat.index'); // Langsung ke halaman Data Jemaat
            }

            return redirect()->intended('/'); 
        }

        return back()->withErrors([
            'email' => 'Email atau kata sandi tidak terdaftar di sistem kami.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
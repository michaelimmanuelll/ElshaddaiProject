<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Proses login user
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Coba login
        if (Auth::attempt($credentials)) {

            // Regenerate session demi keamanan
            $request->session()->regenerate();

            // Jika admin gereja
            if (Auth::user()->isAdminGereja()) {

                return redirect()
                    ->route('jemaat.index')
                    ->with('success', 'Selamat datang Admin Gereja.');
            }

            // Jika user biasa
            return redirect('/')
                ->with('success', 'Berhasil login.');
        }

        // Jika login gagal
        return back()
            ->withErrors([
                'email' => 'Email atau kata sandi tidak terdaftar di sistem kami.',
            ])
            ->onlyInput('email');
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')
            ->with('success', 'Berhasil logout.');
    }
}
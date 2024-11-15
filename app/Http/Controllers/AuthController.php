<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
    //
    public function login()
    {
        return view('login.login');
    }

    public function authenticate(Request $request)
    {
        // Validasi input email atau no_mbkm
        $credentials = $request->validate([
            'login' => 'required', // bisa berupa email atau no_mbkm
            'password' => 'required'
        ]);

        // Tentukan apakah input adalah email atau no_mbkm
        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'no_mbkm';

        // Coba autentikasi berdasarkan jenis login (email atau no_mbkm)
        if (Auth::attempt([$loginType => $credentials['login'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Redirect sesuai role user
            if ($user->role == 'admin') {
                return redirect()->intended('/dashboard');
            } elseif ($user->role == 'students') {
                return redirect()->intended('/');
            }
        }

        // Jika login gagal
        return back()->with('loginError', 'Login Failed!');
    }

    // public function authenticate(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    //         $user = Auth::user();

    //         if ($user->role == 'admin') {
    //             return redirect()->intended('/dashboard');
    //         } elseif ($user->role == 'students') {
    //             return redirect()->intended('/');
    //         }
    //     }
    //     return back()->with('loginError', 'Login Failed!');
    // }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->Session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

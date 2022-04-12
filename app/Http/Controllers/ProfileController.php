<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required',
            'nama_lengkap' => 'required'
        ]);

        if(User::where('id', auth()->user()->id)->update($validatedData)){
            return redirect(route('main'))->with('update-profile-success', 'Profil berhasil diedit!');
        } else {
            return redirect(route('main'))->with('update-profile-error', 'Profil gagal diedit!');
        }
    }

    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'password' => ['required', new MatchOldPassword],
            'newPassword' => 'required|min:8|max:255',
            'confirmNewPassword' => 'required|same:newPassword'
        ]);

        if(User::where('id', auth()->user()->id)->update(['password'=>Hash::make($request->newPassword)])){
            return redirect(route('main'))->with('update-password-success', 'Kata sandi berhasil diubah!');
        } else {
            return redirect(route('main'))->with('update-password-error', 'Kata sandi gagal diubah!');
        }
    }
}

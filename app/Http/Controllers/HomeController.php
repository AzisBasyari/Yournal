<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function main()
    {
        return view('main', [
            "title" => "YOURNAL",
            "catatans" => Catatan::whereUserId(Auth::id())->orderBy('created_at', 'desc')->paginate(5, ['*'], 'home'),
            "posts" => Catatan::whereUserId(Auth::id())->orderBy('created_at', 'desc')->paginate(10, ['*'], 'manage'),
            // "catatans" => Catatan::paginate(5, ['*'], 'home'),
            // "posts" => Catatan::paginate(5, ['*'], 'manage'),
            "no" => 1
        ]);
    }

    public function catatan(Catatan $catatan){
        return view('catatan', [
            "title" => "YOURNAL",
            "catatan" => $catatan
        ]);

    }
}

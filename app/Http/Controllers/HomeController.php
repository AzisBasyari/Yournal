<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Catatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function main()
    {

        $catatan = Catatan::whereUserId(Auth::id())->orderBy('created_at', 'desc');
        $logs = DB::table('logs')->where('logs.user_id', '=', Auth::id())->select('*', 'logs.updated_at as logs_updated_at')->orderBy('logs.created_at', 'desc')->paginate(5, ['*'], 'log');

        return view('main', [
            "title" => "YOURNAL",
            "catatans" => $catatan->paginate(5, ['*'], 'home'),
            "posts" => $catatan->paginate(10, ['*'], 'manage'),
            "logs" => $logs,
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

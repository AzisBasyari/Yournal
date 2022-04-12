<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Catatan;
use Illuminate\Http\Request;
use App\Exports\CatatanExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function main(Request $request)
    {
        $logs = Log::whereBelongsTo(auth()->user())->orderBy('created_at', 'desc')->paginate(5, ['*'], 'log');

        return view('main', [
            "title" => "Yournal",
            "catatans" => Catatan::whereUserId(Auth::id())->orderBy('created_at', 'desc')->paginate(5, ['*'], 'home'),
            "posts" => Catatan::whereUserId(Auth::id())->orderBy(isset($request->filter) ? $request->filter : 'created_at', isset($request->order) ? $request->order : 'desc')->search($request->search)->paginate(10, ['*'], 'manage'),
            "no" => 1,
            "logs" => $logs
        ]);
    }

    public function export()
    {
        return Excel::download(New CatatanExport(auth()->user()->id), 'Catatan Perjalanan_' . auth()->user()->nama_lengkap . '_' . now() . '.xlsx');
    }
}

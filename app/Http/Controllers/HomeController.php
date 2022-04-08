<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Catatan;
use Illuminate\Http\Request;
use App\Exports\CatatanExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function main(Request $request)
    {

        $logs = DB::table('logs')->where('logs.user_id', '=', Auth::id())->select('*', 'logs.updated_at as logs_updated_at')->orderBy('logs.created_at', 'desc')->paginate(5, ['*'], 'log');

        return view('main', [
            "title" => "YOURNAL",
            "catatans" => Catatan::whereUserId(Auth::id())->orderBy('created_at', 'desc')->paginate(5, ['*'], 'home'),
            "posts" => Catatan::whereUserId(Auth::id())->orderBy(isset($request->filter) ? $request->filter : 'created_at', isset($request->order) ? $request->order : 'desc')->search(request(['search']))->paginate(10, ['*'], 'manage'),
            "logs" => $logs,
            "no" => 1,
            "tags" => array("b", "br", "em", "/em",  "hr", "i", "li", "/li", "ol", "/ol", "p", "/p", "s", "span", "table", "tr", "td", "u", "ul", "/ul", "blockquote", "/blockquote", "strong", "/strong", "h1", "/h1", "del", "/del", "a", "/a")
        ]);  
    }

    public function catatan(Catatan $catatan){
        return view('catatan', [
            "title" => "YOURNAL",
            "catatan" => $catatan
        ]);
    }

    public function export()
    {
        return Excel::download(new CatatanExport, 'CatatanPerjalanan_' . auth()->user()->nama_lengkap . '.xlsx');
    }
}

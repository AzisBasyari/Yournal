<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    public function detailLog(Log $log)
    {
        return view('detail_log', [
            "title" => "Yournal",
            "log" => $log
        ]);
    }

    public function destroyLogs(Log $log){
        if(Log::destroy($log->id)){
            return redirect(route('main'))->with('delete-log-success', 'Log catatan berhasil dihapus!');
        } else {
            return redirect(route('main'))->with('delete-log-error', 'Log catatan gagal dihapus!');
        }
    }
}

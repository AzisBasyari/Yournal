<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Catatan;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'nama_tempat' => 'required',
            'alamat' => 'required',
            'tanggal_perjalanan' => 'required',
            'jam_perjalanan' => 'required',
            'suhu_tubuh' => 'required',
            'deskripsi' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['deskripsi'] = strip_tags($request->deskripsi);

        
        if(Catatan::create($validatedData)){   
            return redirect(route('main'))->with('create-success', 'Catatan Perjalanan Berhasil Ditambahkan!');
        } else {
            return redirect(route('main'))->with('create-error', 'Catatan Perjalanan Gagal Ditambahkan!');
        }
    }

    public function destroy(Catatan $catatan){

        // dd($catatan->id);

        if(Catatan::destroy($catatan->id)){   
            return redirect(route('main'))->with('delete-success', 'Catatan Perjalanan Berhasil Dihapus!');
        } else {
            return redirect(route('main'))->with('delete-error', 'Catatan Perjalanan Gagal Dihapus!');
        }
    }

    public function update(Request $request, Catatan $catatan)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'nama_tempat' => 'required',
            'alamat' => 'required',
            'tanggal_perjalanan' => 'required',
            'jam_perjalanan' => 'required',
            'suhu_tubuh' => 'required',
            'deskripsi' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['deskripsi'] = strip_tags($request->deskripsi);
        // dd($validatedData);
        if(Catatan::where('id', $catatan->id)->update($validatedData))
        {
            return redirect(route('main'))->with('update-success', 'Catatan Perjalanan Berhasil Diperbaharui!');
        } else {
            return redirect(route('main'))->with('update-error', 'Catatan Perjalanan Gagal Diperbaharui!');
        }
        

    }

    public function destroyLogs(Log $log){
        if(Log::destroy($log->id)){   
            return redirect(route('main'))->with('delete-log-success', 'Log Berhasil Dihapus!');
        } else {
            return redirect(route('main'))->with('delete-log-error', 'Log Gagal Dihapus!');
        }
    }

}

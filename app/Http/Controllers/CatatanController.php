<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Catatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatatanController extends Controller
{
    public function detailCatatan(Catatan $catatan)
    {
        return view('catatan', [
            "title" => "Yournal",
            "catatan" => $catatan
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_tempat' => 'required|max:255',
            'alamat' => 'required|max:255',
            'tanggal_perjalanan' => 'required',
            'jam_perjalanan' => 'required',
            'suhu_tubuh' => 'required|numeric',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['deskripsi'] = $request->deskripsi;
        $validatedData['created_at'] = now();
        $validatedData['updated_at'] = now();

        if(Catatan::create($validatedData)){
            return redirect(route('main'))->with('create-success', 'Catatan berhasil dibuat!');
        } else {
            return redirect(route('main'))->with('create-error', 'Catatan gagal dibuat!');
        }
    }

    public function destroy(Catatan $catatan)
    {
        if(Catatan::destroy($catatan->id)){
            return redirect(route('main'))->with('delete-success', 'Catatan berhasil dihapus!');
        } else {
            return redirect(route('main'))->with('delete-error', 'Catatan gagal dihapus!');
        }
    }

    public function update(Request $request, Catatan $catatan)
    {
        $validatedData = $request->validate([
            'nama_tempat' => 'required|max:255',
            'alamat' => 'required|max:255',
            'tanggal_perjalanan' => 'required',
            'jam_perjalanan' => 'required',
            'suhu_tubuh' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['deskripsi'] = $request->deskripsi;
        $validatedData['created_at'] = now();
        $validatedData['updated_at'] = now();

        if(Catatan::where('id', $catatan->id)->update($validatedData)){
            return redirect(route('main'))->with('update-success', 'Catatan berhasil diedit!');
        } else {
            return redirect(route('main'))->with('update-error', 'Catatan gagal diedit!');
        }

    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    // protected $fillable = [
    //     'id_catatan',
    //     'user_nik',
    //     'nama_tempat',
    //     'alamat',
    //     'tanggal_berkunjung',
    //     'jam_berkumjung',
    //     'suhu_tubuh',
    //     'deskripsi'
    // ];

    protected $guarded = [
        'id'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function log(){
        return $this->hasMany(Log::class);
    }
}

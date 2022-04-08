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

    public function scopeSearch($query, array $search){
        if(isset($search['search']) ? $search['search'] : false){
            return $query->where('tanggal_perjalanan', 'like', '%' . $search['search'] . '%')
                ->orWhere('jam_perjalanan', 'like', '%' . $search['search'] . '%')
                ->orWhere('nama_tempat', 'like', '%' . $search['search'] . '%')
                ->orWhere('alamat', 'like', '%' . $search['search'] . '%')
                ->orWhere('suhu_tubuh', 'like', '%' . $search['search'] . '%');
        }
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

}

<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Catatan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $guarded = [
        'id'
    ];

    public function scopeSearch($query, $search)
    {
        if(isset($search) ? $search : false){
            return $query->where('tanggal_perjalanan', 'like', '%' . $search . '%')
                ->orWhere('jam_perjalanan', 'like', '%' . $search . '%')
                ->orWhere('nama_tempat', 'like', '%' . $search . '%')
                ->orWhere('alamat', 'like', '%' . $search . '%')
                ->orWhere('suhu_tubuh', 'like', '%' . $search . '%');
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

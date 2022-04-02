<?php

namespace Database\Seeders;

use App\Models\Catatan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'nik' => '1920118133',
            'nama_lengkap' => 'Abdul Azis Basyari',
            'password' => Hash::make('ssiz'),
        ]);

        User::create([
            'nik' => '1920123456',
            'nama_lengkap' => 'creator',
            'password' => Hash::make('creator'),
        ]);

    }
}

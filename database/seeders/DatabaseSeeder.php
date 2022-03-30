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

        Catatan::create([
            'user_id' => 1,
            'nama_tempat' => 'SMKN 4 Bandung',
            'alamat' => 'Jalan Kliningan 6, Bandung, Jawa Barat, Indonesia',
            'tanggal_perjalanan' => date(now()),
            'jam_perjalanan' => '06:30:10',
            'suhu_tubuh' => '36.4',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tempor
            egestas sagittis. Nam malesuada quam tellus, in posuere magna posuere ac. Aenean in pretium
            quam. Donec tristique interdum fermentum. Nullam pharetra ex justo, eget convallis dui
            dignissim blandit. Donec nec eros augue. Nunc at mi eu justo ultricies ornare. Nullam. Lorem
            ipsum dolor sit amet, consectetur adipiscing elit. Cras tempor egestas sagittis. Nam
            malesuada quam tellus, in posuere magna posuere ac. Aenean in pretium quam. Donec tristique
            interdum fermentum. Nullam pharetra ex justo, eget convallis dui dignissim blandit. Donec
            nec eros augue. Nunc at mi eu justo ultricies ornare. Nullam....'
        ]);

        Catatan::create([
            'user_id' => 2,
            'nama_tempat' => 'Rumah',
            'alamat' => 'Jalan Pelindung Hewan III No 2, Bandung, Jawa Barat, Indonesia',
            'tanggal_perjalanan' => '2022-03-26',
            'jam_perjalanan' => '12:45:55',
            'suhu_tubuh' => '36.4',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tempor
            egestas sagittis. Nam malesuada quam tellus, in posuere magna posuere ac. Aenean in pretium
            quam. Donec tristique interdum fermentum. Nullam pharetra ex justo, eget convallis dui
            dignissim blandit. Donec nec eros augue. Nunc at mi eu justo ultricies ornare. Nullam. Lorem
            ipsum dolor sit amet, consectetur adipiscing elit. Cras tempor egestas sagittis. Nam
            malesuada quam tellus, in posuere magna posuere ac. Aenean in pretium quam. Donec tristique
            interdum fermentum. Nullam pharetra ex justo, eget convallis dui dignissim blandit. Donec
            nec eros augue. Nunc at mi eu justo ultricies ornare. Nullam....'
        ]);

        Catatan::create([
            'user_id' => 1,
            'nama_tempat' => 'SMKN 4 Bandung',
            'alamat' => 'Jalan Kliningan 6, Bandung, Jawa Barat, Indonesia',
            'tanggal_perjalanan' => date(now()),
            'jam_perjalanan' => '06:30:10',
            'suhu_tubuh' => '36.4',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tempor
            egestas sagittis. Nam malesuada quam tellus, in posuere magna posuere ac. Aenean in pretium
            quam. Donec tristique interdum fermentum. Nullam pharetra ex justo, eget convallis dui
            dignissim blandit. Donec nec eros augue. Nunc at mi eu justo ultricies ornare. Nullam. Lorem
            ipsum dolor sit amet, consectetur adipiscing elit. Cras tempor egestas sagittis. Nam
            malesuada quam tellus, in posuere magna posuere ac. Aenean in pretium quam. Donec tristique
            interdum fermentum. Nullam pharetra ex justo, eget convallis dui dignissim blandit. Donec
            nec eros augue. Nunc at mi eu justo ultricies ornare. Nullam....'
        ]);

        Catatan::create([
            'user_id' => 1,
            'nama_tempat' => 'SMKN 4 Bandung',
            'alamat' => 'Jalan Kliningan 6, Bandung, Jawa Barat, Indonesia',
            'tanggal_perjalanan' => date(now()),
            'jam_perjalanan' => '06:30:10',
            'suhu_tubuh' => '36.4',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tempor
            egestas sagittis. Nam malesuada quam tellus, in posuere magna posuere ac. Aenean in pretium
            quam. Donec tristique interdum fermentum. Nullam pharetra ex justo, eget convallis dui
            dignissim blandit. Donec nec eros augue. Nunc at mi eu justo ultricies ornare. Nullam. Lorem
            ipsum dolor sit amet, consectetur adipiscing elit. Cras tempor egestas sagittis. Nam
            malesuada quam tellus, in posuere magna posuere ac. Aenean in pretium quam. Donec tristique
            interdum fermentum. Nullam pharetra ex justo, eget convallis dui dignissim blandit. Donec
            nec eros augue. Nunc at mi eu justo ultricies ornare. Nullam....'
        ]);

        Catatan::create([
            'user_id' => 1,
            'nama_tempat' => 'SMKN 4 Bandung',
            'alamat' => 'Jalan Kliningan 6, Bandung, Jawa Barat, Indonesia',
            'tanggal_perjalanan' => date(now()),
            'jam_perjalanan' => '06:30:10',
            'suhu_tubuh' => '36.4',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tempor
            egestas sagittis. Nam malesuada quam tellus, in posuere magna posuere ac. Aenean in pretium
            quam. Donec tristique interdum fermentum. Nullam pharetra ex justo, eget convallis dui
            dignissim blandit. Donec nec eros augue. Nunc at mi eu justo ultricies ornare. Nullam. Lorem
            ipsum dolor sit amet, consectetur adipiscing elit. Cras tempor egestas sagittis. Nam
            malesuada quam tellus, in posuere magna posuere ac. Aenean in pretium quam. Donec tristique
            interdum fermentum. Nullam pharetra ex justo, eget convallis dui dignissim blandit. Donec
            nec eros augue. Nunc at mi eu justo ultricies ornare. Nullam....'
        ]);

        Catatan::create([
            'user_id' => 1,
            'nama_tempat' => 'SMKN 4 Bandung',
            'alamat' => 'Jalan Kliningan 6, Bandung, Jawa Barat, Indonesia',
            'tanggal_perjalanan' => date(now()),
            'jam_perjalanan' => '06:30:10',
            'suhu_tubuh' => '36.4',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tempor
            egestas sagittis. Nam malesuada quam tellus, in posuere magna posuere ac. Aenean in pretium
            quam. Donec tristique interdum fermentum. Nullam pharetra ex justo, eget convallis dui
            dignissim blandit. Donec nec eros augue. Nunc at mi eu justo ultricies ornare. Nullam. Lorem
            ipsum dolor sit amet, consectetur adipiscing elit. Cras tempor egestas sagittis. Nam
            malesuada quam tellus, in posuere magna posuere ac. Aenean in pretium quam. Donec tristique
            interdum fermentum. Nullam pharetra ex justo, eget convallis dui dignissim blandit. Donec
            nec eros augue. Nunc at mi eu justo ultricies ornare. Nullam....'
        ]);
    }
}

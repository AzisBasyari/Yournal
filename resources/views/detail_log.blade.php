@extends('layouts.master')

@section('css')
@endsection

@section('content')
    <section class="container">
        <a class="btn btn-primary rounded-pill px-3 py-0 mb-3 text-white" href="{{ url()->previous() }}" role="button"><img
                src="https://img.icons8.com/material-rounded/24/ffffff/back.png">Kembali</a>

        @if ($log->aktivitas == 'Menambahkan Catatan Baru')
            <h1 class="my-3">Detail Catatan Baru</h1>
            <div class="card shadow-lg mb-5" style="max-width: 100%;">
                <div class="card-body">
                    <h1 class="card-title fs-36 mb-2">{{ $log->nama_tempat }}</h1>
                    <div class="fs-sans">
                        <p class="card-text"><small
                                class="text-muted">{{ date('d F Y', strtotime($log->tanggal_perjalanan)) }} |
                                {{ date('H : i', strtotime($log->jam_perjalanan)) }} | Alamat: {{ $log->alamat }} | Suhu Tubuh:
                                {{ $log->suhu_tubuh }}&#176;</small></p>
                        <hr>
                        <p class="card-text text-justify">{!! $log->deskripsi !!}</p>
                    </div>
                </div>
            </div>
        @elseif ($log->aktivitas == 'Mengedit Catatan')
            <h1 class="my-3">Detail perubahan catatan</h1>
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary rounded-pill text-white mb-2">Sebelum diedit</button>
                    <div class="card shadow-lg mb-5" style="max-width: 100%;">
                        <div class="card-body">
                            <h1 class="card-title fs-36 mb-2">{{ $log->nama_tempat_lama }}</h1>
                            <div class="fs-sans">
                                <p class="card-text"><small
                                        class="text-muted">{{ date('d F Y', strtotime($log->tanggal_perjalanan_lama)) }}
                                        | {{ date('H : i', strtotime($log->jam_perjalanan_lama)) }} | Alamat: {{ $log->alamat_lama }} | Suhu Tubuh:
                                        {{ $log->suhu_tubuh_lama }}&#176;</small></p>
                                <hr>
                                <p class="card-text text-justify">{!! $log->deskripsi_lama !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <button class="btn btn-primary rounded-pill text-white mb-2">Setelah diedit</button>
                    <div class="card shadow-lg mb-5" style="max-width: 100%;">
                        <div class="card-body">
                            <h1 class="card-title fs-36 mb-2">{{ $log->nama_tempat }}</h1>
                            <div class="fs-sans">
                                <p class="card-text"><small
                                        class="text-muted">{{ date('d F Y', strtotime($log->tanggal_perjalanan)) }} |
                                        {{ date('H : i', strtotime($log->jam_perjalanan)) }} | Alamat: {{ $log->alamat }} | Suhu Tubuh:
                                        {{ $log->suhu_tubuh }}&#176;</small></p>
                                <hr>
                                <p class="card-text text-justify">{!! $log->deskripsi !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif ($log->aktivitas == 'Mengedit Catatan')
            <h1 class="my-3">Detail Catatan Terhapus</h1>
            <div class="card shadow-lg mb-5" style="max-width: 100%;">
                <div class="card-body">
                    <h1 class="card-title fs-36 mb-2">{{ $log->nama_tempat_lama }}</h1>
                    <div class="fs-sans">
                        <p class="card-text"><small
                                class="text-muted">{{ date('d F Y', strtotime($log->tanggal_perjalanan_lama)) }} |
                                {{ date('H : i', strtotime($log->jam_perjalanan_lama)) }} | Alamat: {{ $log->alamat_lama }} | Suhu Tubuh:
                                {{ $log->suhu_tubuh_lama }}&#176;</small></p>
                        <hr>
                        <p class="card-text text-justify">{!! $log->deskripsi_lama !!}</p>
                    </div>
                </div>
            </div>
        @endif
    </section>
@endsection

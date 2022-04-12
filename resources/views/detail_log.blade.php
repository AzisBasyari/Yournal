@extends('layouts.master')

@section('content')
    <section class="container">
        <a href="{{ url()->previous() }}" class="btn btn-primary rounded-pill px-3 py-0 mb-3 text-white" role="button">
            <img src="{{ asset('assets/back-24.png') }}" alt="">
            Kembali
        </a>

        @if ($log->aktivitas == 'Menambahkan Catatan Baru')
            <h1 class="my-3">Detail Catatan Baru</h1>

            <div class="card shadow-lg mb-5">
                <div class="card-body">
                    <h1 class="card-title fs-36 mb-0">
                        {{ $log->nama_tempat }}
                    </h1>
                    <div class="fs-sans">
                        <p class="card-text fs-18 my-2">{{ $log->alamat }}</p>
                        <p class="card-text">
                            <small class="text-muted fs-14">
                                {{ date('d F Y', strtotime($log->tanggal_perjalanan)) }} | {{ date('H : i', strtotime($log->jam_perjalanan)) }} | Suhu Tubuh: {{ $log->suhu_tubuh }}&#176;
                            </small>
                        </p>
                        <hr>
                        <p class="card-text text-justify">
                            {!! $log->deskripsi !!}
                        </p>
                    </div>
                </div>
            </div>
        
        @elseif ($log->aktivitas == 'Mengedit Catatan')
            <h1 class="my-3">Detail Catatan Baru</h1>

            <div class="row">
                <div class="col">
                    <button class="btn btn-primary rounded-pill text-white mb-2">Sebelum diedit</button>
                    <div class="card shadow-lg mb-5">
                        <div class="card-body">
                            <h1 class="card-title fs-36 mb-0">
                                {{ $log->nama_tempat_lama }}
                            </h1>
                            <div class="fs-sans">
                                <p class="card-text fs-18 my-2">{{ $log->alamat_lama }}</p>
                                <p class="card-text">
                                    <small class="text-muted fs-14">
                                        {{ date('d F Y', strtotime($log->tanggal_perjalanan_lama)) }} | {{ date('H : i', strtotime($log->jam_perjalanan_lama)) }} | Suhu Tubuh: {{ $log->suhu_tubuh_lama }}&#176;
                                    </small>
                                </p>
                                <hr>
                                <p class="card-text text-justify">
                                    {!! $log->deskripsi_lama !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <button class="btn btn-primary rounded-pill text-white mb-2">Sesudah diedit</button>
                    <div class="card shadow-lg mb-5">
                        <div class="card-body">
                            <h1 class="card-title fs-36 mb-0">
                                {{ $log->nama_tempat }}
                            </h1>
                            <div class="fs-sans">
                                <p class="card-text fs-18 my-2">{{ $log->alamat }}</p>
                                <p class="card-text">
                                    <small class="text-muted fs-14">
                                        {{ date('d F Y', strtotime($log->tanggal_perjalanan)) }} | {{ date('H : i', strtotime($log->jam_perjalanan)) }} | Suhu Tubuh: {{ $log->suhu_tubuh }}&#176;
                                    </small>
                                </p>
                                <hr>
                                <p class="card-text text-justify">
                                    {!! $log->deskripsi !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @elseif ($log->aktivitas == 'Menghapus Catatan')
            <h1 class="my-3">Detail Catatan Terhapus</h1>  
            
            <div class="card shadow-lg mb-5">
                <div class="card-body">
                    <h1 class="card-title fs-36 mb-0">
                        {{ $log->nama_tempat_lama }}
                    </h1>
                    <div class="fs-sans">
                        <p class="card-text fs-18 my-2">{{ $log->alamat_lama }}</p>
                        <p class="card-text">
                            <small class="text-muted fs-14">
                                {{ date('d F Y', strtotime($log->tanggal_perjalanan_lama)) }} | {{ date('H : i', strtotime($log->jam_perjalanan_lama)) }} | Suhu Tubuh: {{ $log->suhu_tubuh_lama }}&#176;
                            </small>
                        </p>
                        <hr>
                        <p class="card-text text-justify">
                            {!! $log->deskripsi_lama !!}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        
    </section>
@endsection
@extends('layouts.master')

@section('content')
    <section class="container">
        <a href="{{ url()->previous() }}" class="btn btn-primary rounded-pill px-3 py-0 mb-3 text-white" role="button">
            <img src="{{ asset('assets/back-24.png') }}" alt="">
            Kembali
        </a>

        <div class="card shadow-lg mb-5">
            <div class="card-body">
                <h1 class="card-title fs-36 mb-0">
                    Catatan Ke-{{ $catatan->id }} | {{ $catatan->nama_tempat }}
                </h1>
                <div class="fs-sans">
                    <p class="card-text fs-18 my-2">{{ $catatan->alamat }}</p>
                    <p class="card-text">
                        <small class="text-muted fs-14">
                            {{ date('d F Y', strtotime($catatan->tanggal_perjalanan)) }} | {{ date('H : i', strtotime($catatan->jam_perjalanan)) }} | Suhu Tubuh: {{ $catatan->suhu_tubuh }}&#176;
                        </small>
                    </p>
                    <hr>
                    <p class="card-text text-justify">
                        {!! $catatan->deskripsi !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
@extends('layouts.master')

@section('css')
    
@endsection

@section('content')
    <section class="container">
        <a class="btn btn-primary rounded-pill px-3 py-0 mb-3 text-white" href="{{ url()->previous() }}" role="button"><img src="https://img.icons8.com/material-rounded/24/ffffff/back.png">Kembali</a>

        <div class="card shadow-lg mb-5" style="max-width: 100%;">
            <div class="card-body">
                <h1 class="card-title fs-36 mb-0">Catatan Ke-{{ $catatan->id }} | {{ $catatan->nama_tempat }}</h1>
                <div class="fs-sans">
                    <p class="card-text fs-18 my-2">{{  $catatan->alamat  }}</p>
                    <p class="card-text"><small
                            class="text-muted fs-14">{{ date('d F Y', strtotime($catatan->tanggal_perjalanan)) }} |
                            {{ date('H : i', strtotime($catatan->jam_perjalanan)) }} | Suhu Tubuh:
                            {{ $catatan->suhu_tubuh }}&#176;</small></p>
                    <hr>
                    <p class="card-text" style="text-align: justify">{!! $catatan->deskripsi !!}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
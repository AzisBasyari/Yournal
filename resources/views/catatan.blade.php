@extends('layouts.master')

@section('css')
    
@endsection

@section('content')
    <section class="container">
        <a class="btn btn-primary rounded-pill px-3 py-0 mb-3 text-white" href="{{ route('main') }}" role="button"><img src="https://img.icons8.com/material-rounded/24/ffffff/back.png">Kembali ke halaman utama</a>
        <h1 class="fs-48">Catatan Ke-{{ $catatan->id }} | {{ $catatan->nama_tempat }}</h1>
        <p class="fs-18 fs-sans">{{ $catatan->alamat }}</p>
        <p class="fs-14 fs-sans text-muted">{{ date('d F Y', strtotime($catatan->tanggal_perjalanan)) }} | {{ date('H : i', strtotime($catatan->jam_perjalanan)) }} | Suhu Tubuh: {{ $catatan->suhu_tubuh }}&#176;</p>
        <p class="fs-18 fs-sans" style="text-align: justify">{!! $catatan->deskripsi !!}</p>
    </section>
@endsection
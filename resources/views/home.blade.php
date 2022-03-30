{{-- @extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/navbar.css">
@endsection --}}

{{-- @section('button-navbar')
    <button class="btn btn-light text-dark rounded-pill fs-sans px-5 py-2 my-0 fs-14">
      Keluar
    </button>
@endsection --}}
{{-- 
@section('content')
    @include('layouts.header') --}}

    <section class="mt-5">
        <h1 class="fs-36">Catatan Terbaru</h1>
            {{-- | <a href="#" class="fs-24 text-black-50 fs-sans text-decoration-none">Catatan yang dibintangi</a></h1> --}}
    </section>

    <section class="mt-5">
        @foreach($catatans as $catatan)
        <div class="card mb-3" style="max-width: 100%; border: none">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="assets/home.svg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title fs-36 mb-0">{{ $catatan->nama_tempat }}</h1>
                        <div class="fs-sans">
                            <p class="card-text"><small class="text-muted">{{ date('d F Y', strtotime($catatan->tanggal_perjalanan)) }} | {{ date('H : i', strtotime($catatan->jam_perjalanan)) }} | Suhu Tubuh: {{ $catatan->suhu_tubuh }}&#176;</small></p>
                            <p class="card-text pb-5 text-justify">{{ Str::limit($catatan->deskripsi, 500)}}</p>
                            <div class="position-relative">
                                <div class="position-absolute bottom-0 start-0">
                                    <a class="btn btn-primary rounded-pill text-light"  href="/catatan-{{ $catatan->id }}" role="button">
                                        Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        @endforeach

        <div class="d-flex mb-5 justify-content-end">
            <div class="rounded-pill">
                {{ $catatans->links('partials.pagination') }}
            </div>
        </div>
    </section>
{{-- @endsection --}}

<section class="mt-5">
    <h1 class="fs-36">Catatan Terbaru</h1>
    {{-- | <a href="#" class="fs-24 text-black-50 fs-sans text-decoration-none">Catatan yang dibintangi</a></h1> --}}
</section>

<section class="mt-5">
    @foreach ($catatans as $catatan)
    <div class="card shadow-lg mb-3" style="max-width: 100%;">
        <div class="card-body">
            <h1 class="card-title fs-36 mb-0">{{ $catatan->nama_tempat }}</h1>
            <div class="fs-sans">
                <p class="card-text"><small
                        class="text-muted">{{ date('d F Y', strtotime($catatan->tanggal_perjalanan)) }}
                        | {{ date('H : i', strtotime($catatan->jam_perjalanan)) }} | Suhu Tubuh:
                        {{ $catatan->suhu_tubuh }}&#176; | Alamat: {{ $catatan->alamat }}</small></p>
                <p class="card-text text-justify">{!! Str::limit(strip_tags($catatan->deskripsi, $tags), 200) !!}</p>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary rounded-pill text-light shadow" href="/catatan-{{ $catatan->id }}"
                        role="button">
                        Selengkapnya
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="d-flex mb-5 justify-content-end">
        <div class="rounded-pill">
            {{ $catatans->links('partials.pagination') }}
        </div>
    </div>
</section>
{{-- @endsection --}}

@if (session()->has('create-success'))
    <div class="alert alert-primary mt-5" role="alert">
        {{ session('create-success') }}
    </div>
@elseif(session()->has('create-error'))
    <div class="alert alert-primary mt-5" role="alert">
        {{ session('create-error') }}
    </div>
@endif

<section class="mt-5">
    <h1 class="fs-36">Buat Catatan</h1>
</section>

<section class="mt-5">
    <div class="col-lg-8">
        <form action="/manage-catatan" method="post">
            @csrf
            <div class="mb-5">
                <input type="text" class="form-control" id="formCatatan" placeholder="Nama tempat yang dikunjungi"
                    name="nama_tempat">
            </div>
            <div class="mb-5">
                <input type="text" class="form-control" id="formCatatan" placeholder="Alamat" name="alamat">
            </div>
            <div class="mb-5">
                <input type="date" class="form-control" id="formCatatan" placeholder="Tanggal perjalanan"
                    name="tanggal_perjalanan">
            </div>
            <div class="mb-5">
                <input type="time" class="form-control" id="formCatatan" placeholder="Jam" name="jam_perjalanan">
            </div>
            <div class="mb-5">
                <input type="text" class="form-control" id="formCatatan" placeholder="Suhu Tubuh (Celcius)"
                    name="suhu_tubuh">
            </div>
            <div class="mb-3">
                <input id="deskripsi" type="hidden" name="deskripsi">
                <trix-editor input="deskripsi"></trix-editor>
            </div>
            <div class="mb-5 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary rounded-pill text-white px-5 py-2">Buat</button>
            </div>
        </form>
    </div>
</section>
{{-- @endsection --}}

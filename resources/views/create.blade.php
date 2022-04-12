@if (session()->has('create-success'))
    <div class="alert alert-primary mt-5 fade show d-flex justify-content-between" role="alert">
        {{ session('create-success') }}
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
@elseif(session()->has('create-error'))
    <div class="alert alert-danger mt-5 fade show d-flex justify-content-between" role="alert">
        {{ session('create-error') }}
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
@endif

<section class="mt-5">
    <h1 class="fs-36">Buat Catatan</h1>
</section>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
             @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
             @endforeach
        </ul>
    </div>
@endif

<section class="mt-5">
    <div class="col-lg-8">
        <form action="/create-catatan" method="post">
            @csrf
            <div class="mb-5">
                <input type="text" name="nama_tempat" id="formCatatan" class="form-control"
                    placeholder="Masukkan nama tempat" value="{{ old('nama_tempat') }}" required>
            </div>
            <div class="mb-5">
                <input type="text" name="alamat" id="formCatatan" class="form-control"
                    placeholder="Masukkan alamat" value="{{ old('nama_tempat') }}" required>
            </div>
            <div class="mb-5">
                <input type="date" name="tanggal_perjalanan" id="formCatatan" class="form-control" value="{{ old('tanggal_perjalanan') }}" required>
            </div>
            <div class="mb-5">
                <input type="time" name="jam_perjalanan" id="formCatatan" class="form-control" value="{{ old('jam_perjalanan') }}" required>
            </div>
            <div class="mb-5">
                <input type="text" name="suhu_tubuh" id="formCatatan" class="form-control"
                    placeholder="Masukkan suhu tubuh" value="{{ old('suhu_tubuh') }}" required>
            </div>
            <div class="mb-3">
                <input type="hidden" name="deskripsi" id="deskripsi" value="{{ old('deskripsi') }}">
                <trix-editor input="deskripsi" ></trix-editor>
            </div>
            <div class="mb-5 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary rounded-pill text-white px-5 py-2">
                    Buat
                </button>
            </div>
        </form>
    </div>
</section>

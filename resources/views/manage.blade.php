@if (session()->has('update-success'))
    <div class="alert alert-primary mt-5 fade show d-flex justify-content-between" role="alert">
        {{ session('update-success') }}
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
@elseif(session()->has('update-error'))
    <div class="alert alert-danger mt-5 fade show d-flex justify-content-between" role="alert">
        {{ session('update-error') }}
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
@endif

@if (session()->has('delete-success'))
    <div class="alert alert-primary mt-5 fade show d-flex justify-content-between" role="alert">
        {{ session('delete-success') }}
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
@elseif(session()->has('delete-error'))
    <div class="alert alert-danger mt-5 fade show d-flex justify-content-between" role="alert">
        {{ session('delete-error') }}
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
@endif

<section class="mt-5">
    <div class="d-flex justify-content-between">
        <h1 class="fs-36">
            Kelola Catatan
        </h1>
        <form action="/export" method="post">
            @csrf
            <button type="submit" class="btn btn-primary rounded-pill px-4 text-white">
                Eskpor seluruh catatan
            </button>
        </form>
    </div>

    <form action="/main" method="get">
        @csrf
        <div class="row mt-3">
            <div class="col-lg-2">
                <label for="filter" class="form-label">Urut Berdasarkan</label>
                <select name="filter" id="filter" class="form-select" aria-label="filter">
                    <option value="{{ request('filter') }}">
                        @if (request('filter') == 'tanggal_perjalanan')
                            Tanggal
                        @elseif(request('filter') == 'jam_perjalanan')
                            Jam Perjalanan
                        @elseif(request('filter') == 'nama_tempat')
                            Nama Tempat
                        @elseif(request('filter') == 'alamat')
                            Alamat
                        @elseif(request('filter') == 'suhu_tubuh')
                            Suhu Tubuh      
                        @else
                            Pilih                      
                        @endif
                    </option>
                    <option value="" disabled>------------------</option>
                    <option value="tanggal_perjalanan">Tanggal Perjalanan</option>
                    <option value="jam_perjalanan">Jam Perjalanan</option>
                    <option value="nama_tempat">Nama Tempat</option>
                    <option value="alamat">Alamat</option>
                    <option value="suhu_tubuh">Suhu Tubuh</option>
                </select>
            </div>
            <div class="col-lg-3">
                <label for="order" class="form-label">Urut Berdasarkan</label>
                <select name="order" id="order" class="form-select" aria-label="order">
                    <option value="{{ request('order') }}">
                        @if (request('order') == 'desc')
                            Berurutan Turun
                        @elseif(request('order') == 'asc')
                            Berurutan Naik              
                        @else
                            Pilih
                        @endif
                    </option>
                    <option value="" disabled>--------------------------</option>
                    <option value="desc">Berurutan Turun</option>
                    <option value="asc">Berurutan Naik</option>
                </select>
            </div>
            <div class="col-lg-5">
                <label for="search" class="form-label">Cari berdasarkan tanggal<span class="text-danger">*</span>, jam, tempat, alamat, dan suhu</label>
                <input type="text" name="search" id="search" class="form-control" placeholder="Cari" value="{{ request('search') }}">
            </div>
            <div class="col-lg-2 mt-4 pt-1 mb-2">
                <button class="btn btn-primary rounded-pill px-4" type="submit">
                    <img src="{{ asset('assets/search-24.png') }}" alt="">
                </button>
                <a class="btn btn-primary rounded-pill px-4" href="/main">
                    <img src="{{ asset('assets/reset-24.png') }}" alt="">
                </a>
            </div>
        </div>
    </form>
    <span class="text-danger">*Format pencarian berdasarkan tanggal adalah Tahun-Bulan-Tanggal, contoh: 2022-12-31</span>
</section>

<section class="mt-3">
    <table class="table table-bordered border-white">
        <thead class="bg-primary text-white text-center">
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Nama Tempat</th>
                <th>Alamat</th>
                <th>Suhu Tubuh (Celcius)</th>
                <th colspan="3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $catatan)

            <tr>
                <th class="text-center">{{ $no++ }}</th>
                <td class="text-center">{{ date('d F Y', strtotime($catatan->tanggal_perjalanan)) }}</td>
                <td class="text-center">{{ date('H : i', strtotime($catatan->jam_perjalanan)) }}</td>
                <td class="text-center">{{ $catatan->nama_tempat }}</td>
                <td class="text-center">{{ Str::limit($catatan->alamat,30) }}</td>
                <td class="text-center">{{ $catatan->suhu_tubuh }}&#176;</td>
                <td class="text-center">
                    <a href="/catatan-{{ $catatan->id }}" role="button">
                        <img src="{{ asset('assets/eye-24.png') }}" alt="">
                    </a>
                </td>
                <td class="text-center">
                    <button type="button" class="btn p-0 m-0" data-bs-toggle="modal" data-bs-target="#edit"
                    data-bs-id="{{ $catatan->id }}"
                    data-bs-tanggal="{{ $catatan->tanggal_perjalanan }}"
                    data-bs-jam="{{ $catatan->jam_perjalanan }}"
                    data-bs-tempat="{{ $catatan->nama_tempat }}"
                    data-bs-alamat="{{ $catatan->alamat }}"
                    data-bs-suhu="{{ $catatan->suhu_tubuh }}"
                    data-bs-deskripsi="{{ $catatan->deskripsi }}">
                        <img src="{{ asset('assets/edit-24.png') }}" alt="">
                    </button>
                </td>
                <td class="text-center">
                    <form action="/manage-catatan/delete/{{ $catatan->id }}" method="post">
                        @csrf
                        <button type="submit" class="btn p-0 m-0">
                            <img src="{{ asset('assets/trash-24.png') }}" alt="">
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex mb-5 justify-content-end">
        <div class="rounded-pill">
            {{ $posts->links('partials.pagination') }}
        </div>
    </div>
</section>

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="labelEdit" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-3" style="border-radius: 30px">
            <div class="modal-header">
                <h5 class="modal-title fs-24" id="labelEdit">Edit Catatan</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/manage-catatan/edit/" method="post" id="formEdit">
                    @csrf
                    <div class="container mb-3">
                        <p class="fs-14 mb-0">Tanggal Perjalanan</p>
                        <input type="date" name="tanggal_perjalanan" id="tanggal" class="form-control" required>
                    </div>
                    <div class="container mb-3">
                        <p class="fs-14 mb-0">Jam</p>
                        <input type="time" name="jam_perjalanan" id="jam" class="form-control" required>
                    </div>
                    <div class="container mb-3">
                        <p class="fs-14 mb-0">Nama Tempat</p>
                        <input type="text" name="nama_tempat" id="tempat" class="form-control" placeholder="Masukkan nama tempat" required>
                    </div>
                    <div class="container mb-3">
                        <p class="fs-14 mb-0">Alamat</p>
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat" required>
                    </div>
                    <div class="container mb-3">
                        <p class="fs-14 mb-0">Suhu Tubuh</p>
                        <input type="text" name="suhu_tubuh" id="suhu" class="form-control" placeholder="Masukkan suhu tubuh" required>
                    </div>
                    <div class="container mb-3">
                        <input id="deskripsi_edit" type="hidden" name="deskripsi" >
                        <trix-editor  input="deskripsi_edit" id="deskripsi_trix"></trix-editor>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-primary text-dark rounded-pill px-5" type="button" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button class="btn btn-primary text-light rounded-pill px-5" type="submit">
                            Edit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var editModal = document.getElementById('edit')
    editModal.addEventListener('show.bs.modal', function(event){
        var button = event.relatedTarget

        var id = button.getAttribute('data-bs-id')
        var tanggal = button.getAttribute('data-bs-tanggal')
        var jam = button.getAttribute('data-bs-jam')
        var tempat = button.getAttribute('data-bs-tempat')
        var alamat = button.getAttribute('data-bs-alamat')
        var suhu = button.getAttribute('data-bs-suhu')
        var deskripsi = button.getAttribute('data-bs-deskripsi')

        var id_input = editModal.querySelector('#formEdit');
        var tanggal_input = editModal.querySelector('#tanggal');
        var jam_input = editModal.querySelector('#jam');
        var tempat_input = editModal.querySelector('#tempat');
        var alamat_input = editModal.querySelector('#alamat');
        var suhu_input = editModal.querySelector('#suhu');
        var deskripsi_trix_input = editModal.querySelector('#deskripsi_trix');
        var deskripsi_input = editModal.querySelector('#deskripsi_edit');

        var url_edit = `/manage-catatan/edit/${id}`;

        id_input.setAttribute("action", url_edit);
        tanggal_input.value = tanggal
        jam_input.value = jam
        tempat_input.value = tempat
        alamat_input.value = alamat
        suhu_input.value = suhu
        deskripsi_trix_input.value = deskripsi
        deskripsi_input.value = deskripsi

        console.log(deskripsi);
    });
</script>


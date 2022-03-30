@if (session()->has('delete-success'))
    <div class="alert alert-primary mt-5" role="alert">
        {{ session('delete-success') }}
    </div>
@elseif(session()->has('delete-error'))
    <div class="alert alert-primary mt-5" role="alert">
        {{ session('delete-error') }}
    </div>
@endif

@if (session()->has('update-success'))
    <div class="alert alert-primary mt-5" role="alert">
        {{ session('update-success') }}
    </div>
@elseif(session()->has('update-error'))
    <div class="alert alert-primary mt-5" role="alert">
        {{ session('update-error') }}
    </div>
@endif

<section class="mt-5">
    <h1 class="fs-36">Kelola catatan</h1>
</section>

<section class="mt-5">
    <table class="table table-bordered border-white">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jam</th>
                <th scope="col">Nama Tempat</th>
                <th scope="col">Alamat</th>
                <th scope="col">Suhu Tubuh (Celcius)</th>
                <th scope="col" colspan="3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $catatan)
            
                <tr>
                    <th>{{ $no++ }}</th>
                    <td>{{ date('d F Y', strtotime($catatan->tanggal_perjalanan)) }}</td>
                    <td>{{ date('H : i', strtotime($catatan->jam_perjalanan)) }}</td>
                    <td>{{ $catatan->nama_tempat }}</td>
                    <td>{{ $catatan->alamat }}</td>
                    <td>{{ $catatan->suhu_tubuh }}&#176;</td>
                    <td>
                        <a href="/catatan-{{ $catatan->id }}" role="button">
                            <img src="https://img.icons8.com/material-rounded/24/80B5DF/eye.png">
                        </a>
                    </td>
                    <td>
                        <button type="button" class="btn p-0 m-0" data-bs-toggle="modal" data-bs-target="#edit" 
                        data-bs-id="{{ $catatan->id }}"
                        data-bs-tempat="{{ $catatan->nama_tempat }}"
                        data-bs-tanggal="{{ $catatan->tanggal_perjalanan }}"
                        data-bs-jam="{{ $catatan->jam_perjalanan }}"
                        data-bs-alamat="{{ $catatan->alamat }}"
                        data-bs-suhu="{{ $catatan->suhu_tubuh }}"
                        data-bs-deskripsi="{{ $catatan->deskripsi }}">
                            <img src="https://img.icons8.com/material-rounded/24/80B5DF/edit.png">
                        </button>
                    </td>
                    <td>
                        <form action="/manage-catatan/delete/{{ $catatan->id }}" method="POST">
                            {{-- @method('delete') --}}
                            @csrf
                            {{-- <input type="hidden" name="delete" value="{{ $catatan->id }}"> --}}
                            <button type="submit" class="btn p-0 m-0">
                                <img src="https://img.icons8.com/material-rounded/24/80B5DF/trash.png">
                            </button>
                        </form>
                    </td>
                </tr>
                {{-- {{ dd($catatan) }} --}}
            @endforeach
        </tbody>
    </table>

    <div class="d-flex mb-5 justify-content-end">
        <div class="rounded-pill">
            {{ $posts->links('partials.pagination') }}
        </div>
    </div>
</section>

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-3" style="border-radius: 30px">
            <div class="modal-header">
                <h5 class="modal-title fs-24" id="editLabel">Edit Catatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/manage-catatan/edit/" id="formEdit">
                    @csrf
                    <div class="container mb-3">
                        <p class="fs-14 mb-0">Tanggal Perjalanan</p>
                        <input type="date" class="form-control" id="tanggal" name='tanggal_perjalanan'
                            placeholder="Tanggal perjalanan">
                    </div>
                    <div class="container mb-3">
                        <p class="fs-14 mb-0">Jam</p>
                        <input type="time" class="form-control" id="jam" name="jam_perjalanan"
                            placeholder="Jam">
                    </div>
                    <div class="container mb-3">
                        <p class="fs-14 mb-0">Nama Tempat</p>
                            <input type="text" name="nama_tempat" class="form-control password"
                                id="tempat" placeholder="Nama tempat">
                    </div>
                    <div class="container mb-3">
                        <p class="fs-14 mb-0">Alamat</p>
                            <input type="text" name="alamat" class="form-control password"
                                id="alamat" placeholder="Nama tempat">
                    </div>
                    <div class="container mb-3">
                        <p class="fs-14 mb-0">Suhu Tubuh</p>
                            <input type="text" name="suhu_tubuh" class="form-control password"
                                id="suhu" placeholder="Suhu Tubuh (Celcius)">
                    </div>
                    <div class="container mb-3">
                        <input id="deskripsi" type="hidden" name="deskripsi">
                        <trix-editor input="deskripsi" id="deskripsi-trix" style="height: 50vh"></trix-editor>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary text-dark" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary text-light">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    var exampleModal = document.getElementById('edit')
exampleModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var id = button.getAttribute('data-bs-id')
  var tanggal = button.getAttribute('data-bs-tanggal')
  var jam = button.getAttribute('data-bs-jam')
  var tempat = button.getAttribute('data-bs-tempat')
  var alamat = button.getAttribute('data-bs-alamat')
  var suhu = button.getAttribute('data-bs-suhu')
  var deskripsi = button.getAttribute('data-bs-deskripsi')
//   var id = button.getAttribute('data-bs-id')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
    var id_input = exampleModal.querySelector("#formEdit");
    var tanggal_input = exampleModal.querySelector("#tanggal");
    var jam_input = exampleModal.querySelector("#jam");
    var tempat_input = exampleModal.querySelector("#tempat");
    var alamat_input = exampleModal.querySelector("#alamat");
    var suhu_input = exampleModal.querySelector("#suhu");
    var deskripsi_trix_input = exampleModal.querySelector("#deskripsi-trix");
    var deskripsi_input = exampleModal.querySelector("#deskripsi");

    var url_edit = `/manage-catatan/edit/${id}`;

    id_input.setAttribute("action", url_edit);
    tanggal_input.value = tanggal
    jam_input.value = jam
    tempat_input.value = tempat
    alamat_input.value = alamat
    suhu_input.value = suhu
    deskripsi_trix_input.value = deskripsi
    deskripsi_input.value = deskripsi
});
</script>
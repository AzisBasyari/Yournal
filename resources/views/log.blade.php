@if (session()->has('delete-log-success'))
    <div class="alert alert-primary mt-5" role="alert">
        {{ session('delete-log-success') }}
    </div>
@elseif(session()->has('delete-log-error'))
    <div class="alert alert-primary mt-5" role="alert">
        {{ session('delete-log-error') }}
    </div>
@endif

<section class="mt-5">
    <h1 class="fs-36">Log</h1>
</section>

<section class="mt-5">
    <table class="table table-bordered border-white">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Aktivitas</th>
                <th scope="col">Pada</th>
                <th scope="col" colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            
                <tr>
                    <th>{{ $no++ }}</th>
                    <td>{{ $log->aktivitas }}</td>
                    <td>{{ date('d F Y | G : i', strtotime($log->logs_updated_at)) }}</td>
                    <td>
                        <button type="button" class="btn p-0 m-0" data-bs-toggle="modal" data-bs-target="#log"
                        data-bs-idLog="{{ $log->id }}"
                        data-bs-aktivitasLog="{{ $log->aktivitas }}"
                        data-bs-tempatLog="{{ $log->nama_tempat }}"
                        data-bs-tanggalLog="{{ date('d F Y', strtotime($log->tanggal_perjalanan)) }}"
                        data-bs-jamLog="{{ date('H : i', strtotime($log->jam_perjalanan)) }}"
                        data-bs-alamatLog="{{ $log->alamat }}"
                        data-bs-suhuLog="{{ $log->suhu_tubuh }}"
                        data-bs-deskripsiLog="{{ $log->deskripsi }}"
                        data-bs-tempatLog-lama="{{ $log->nama_tempat_lama }}"
                        data-bs-tanggalLog-lama="{{ date('d F Y', strtotime($log->tanggal_perjalanan_lama)) }}"
                        data-bs-jamLog-lama="{{ date('H : i', strtotime($log->jam_perjalanan_lama)) }}"
                        data-bs-alamatLog-lama="{{ $log->alamat_lama }}"
                        data-bs-suhuLog-lama="{{ $log->suhu_tubuh_lama }}"
                        data-bs-deskripsiLog-lama="{{ $log->deskripsi_lama }}">
                            <img src="https://img.icons8.com/material-rounded/24/80B5DF/eye.png">
                        </button>
                    </td>
                    <td>
                        <form action="/delete-log/{{ $log->id }}" method="POST">
                            {{-- @method('delete') --}}
                            @csrf
                            {{-- <input type="hidden" name="delete" value="{{ $log->id }}"> --}}
                            <button type="submit" class="btn p-0 m-0">
                                <img src="https://img.icons8.com/material-rounded/24/80B5DF/trash.png">
                            </button>
                        </form>
                    </td>
                </tr>
                {{-- {{ dd($log) }} --}}

                <div class="modal fade" id="log" tabindex="-1" aria-labelledby="logLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content p-3" style="border-radius: 30px">
                            <div class="modal-header">
                                <h5 class="modal-title fs-24" id="logLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                    <div class="container mb-3">
                                        <p class="fs-14 mb-0">Tanggal Perjalanan</p>
                                        <input type="text" class="form-control" id="tanggalLog" name='tanggalLog'
                                            placeholder="" disabled>
                                    </div>
                                    <div class="container mb-3">
                                        <p class="fs-14 mb-0">Jam</p>
                                        <input type="text" class="form-control" id="jamLog" name="jamLog"
                                            placeholder="Jam" >
                                    </div>
                                    <div class="container mb-3">
                                        <p class="fs-14 mb-0">Nama Tempat</p>
                                            <input type="text" name="tempatLog" class="form-control password"
                                                id="tempatLog" placeholder="Nama tempat" disabled>
                                    </div>
                                    <div class="container mb-3">
                                        <p class="fs-14 mb-0">Alamat</p>
                                            <input type="text" name="alamatLog" class="form-control password"
                                                id="alamatLog" placeholder="Nama tempat" disabled>
                                    </div>
                                    <div class="container mb-3">
                                        <p class="fs-14 mb-0">Suhu Tubuh</p>
                                            <input type="text" name="suhuLog" class="form-control password"
                                                id="suhuLog" placeholder="Suhu Tubuh (Celcius)" disabled>
                                    </div>
                                    <div class="container mb-3">
                                        <p class="fs-14 mb-0">Deskripsi</p>
                                        <input type="text" name="deskripsiLog" class="form-control password"
                                                id="deskripsiLog" placeholder="Suhu Tubuh (Celcius)" disabled>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-primary text-dark" data-bs-dismiss="modal">Tutup</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            @endforeach
        </tbody>
    </table>

    <div class="d-flex mb-5 justify-content-end">
        <div class="rounded-pill">
            {{ $logs->links('partials.pagination') }}
        </div>
    </div>
</section>

<script>
    var logModal = document.getElementById('log')
    logModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var idLog = button.getAttribute('data-bs-idLog')
    var aktivitasLog = button.getAttribute('data-bs-aktivitasLog')
    var tanggalLog = button.getAttribute('data-bs-tanggalLog')
    var jamLog = button.getAttribute('data-bs-jamLog')
    var tempatLog = button.getAttribute('data-bs-tempatLog')
    var alamatLog = button.getAttribute('data-bs-alamatLog')
    var suhuLog = button.getAttribute('data-bs-suhuLog')
    var deskripsiLog = button.getAttribute('data-bs-deskripsiLog')
    var tanggalLog_lama = button.getAttribute('data-bs-tanggalLog-lama')
    var jamLog_lama = button.getAttribute('data-bs-jamLog-lama')
    var tempatLog_lama = button.getAttribute('data-bs-tempatLog-lama')
    var alamatLog_lama = button.getAttribute('data-bs-alamatLog-lama')
    var suhuLog_lama = button.getAttribute('data-bs-suhuLog-lama')
    var deskripsiLog_lama = button.getAttribute('data-bs-deskripsiLog-lama')
    //   var id = button.getAttribute('data-bs-id')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
        var label = logModal.querySelector("#logLabel");
        var tanggalLog_input = logModal.querySelector("#tanggalLog");
        var jamLog_input = logModal.querySelector("#jamLog");
        var tempatLog_input = logModal.querySelector("#tempatLog");
        var alamatLog_input = logModal.querySelector("#alamatLog");
        var suhuLog_input = logModal.querySelector("#suhuLog");
        var deskripsiLog_input = logModal.querySelector("#deskripsiLog");

        if(aktivitasLog == 'Menambahkan Catatan Baru'){
            label.innerHTML = 'Detail Catatan Baru'
            tanggalLog_input.placeholder = tanggalLog
            jamLog_input.placeholder = jamLog 
            tempatLog_input.placeholder = tempatLog 
            alamatLog_input.placeholder = alamatLog 
            suhuLog_input.placeholder = suhuLog 
            deskripsiLog_input.placeholder = deskripsiLog
        } else if(aktivitasLog == 'Memperbaharui Catatan'){
            label.innerHTML = 'Detail Perubahan Catatan'
            tanggalLog_input.placeholder = tanggalLog_lama + ' ---> ' + tanggalLog
            jamLog_input.placeholder = jamLog_lama + ' ---> ' + jamLog
            tempatLog_input.placeholder = tempatLog_lama + ' ---> ' + tempatLog
            alamatLog_input.placeholder = alamatLog_lama + ' ---> ' + alamatLog
            suhuLog_input.placeholder = suhuLog_lama + ' ---> ' + suhuLog
            deskripsiLog_input.placeholder = deskripsiLog_lama + ' ---> ' + deskripsiLog
        } else if(aktivitasLog == 'Menghapus Catatan'){
            label.innerHTML = 'Detail Catatan Terhapus'
            tanggalLog_input.placeholder = tanggalLog_lama
            jamLog_input.placeholder = jamLog_lama 
            tempatLog_input.placeholder = tempatLog_lama 
            alamatLog_input.placeholder = alamatLog_lama 
            suhuLog_input.placeholder = suhuLog_lama 
            deskripsiLog_input.placeholder = deskripsiLog_lama
        }

         
    });
</script>
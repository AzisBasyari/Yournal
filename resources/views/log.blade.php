<section class="mt-5">
    <h1 class="fs-36">Log</h1>
</section>

<section class="mt-5">
    <table class="table table-bordered border-white">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">ID Catatan</th>
                <th scope="col">Aktivitas</th>
                <th scope="col">Pada</th>
                {{-- <th scope="col">Alamat</th>
                <th scope="col">Suhu Tubuh (Celcius)</th> --}}
                <th scope="col" colspan="3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            
                <tr>
                    <th>{{ $no++ }}</th>
                    {{-- <td>{{ date('H : i', strtotime($log->jam_perjalanan)) }}</td> --}}
                    <td>{{ $log->catatan_id }}</td>
                    <td>{{ $log->aktivitas }}</td>
                    <td>{{ date('d F Y | H : i', strtotime($log->created_at)) }}</td>
                    {{-- <td>{{ $log->suhu_tubuh }}&#176;</td> --}}
                    <td>
                        <a href="/catatan-{{ $log->id }}" role="button">
                            <img src="https://img.icons8.com/material-rounded/24/80B5DF/eye.png">
                        </a>
                    </td>
                    {{-- <td>
                        <button type="button" class="btn p-0 m-0" data-bs-toggle="modal" data-bs-target="#edit" 
                        data-bs-id="{{ $log->id }}"
                        data-bs-tempat="{{ $log->nama_tempat }}"
                        data-bs-tanggal="{{ $log->tanggal_perjalanan }}"
                        data-bs-jam="{{ $log->jam_perjalanan }}"
                        data-bs-alamat="{{ $log->alamat }}"
                        data-bs-suhu="{{ $log->suhu_tubuh }}"
                        data-bs-deskripsi="{{ $log->deskripsi }}">
                            <img src="https://img.icons8.com/material-rounded/24/80B5DF/edit.png">
                        </button>
                    </td> --}}
                    <td>
                        <form action="/manage-catatan/delete/{{ $log->id }}" method="POST">
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
            @endforeach
        </tbody>
    </table>

    <div class="d-flex mb-5 justify-content-end">
        <div class="rounded-pill">
            {{ $posts->links('partials.pagination') }}
        </div>
    </div>
</section>
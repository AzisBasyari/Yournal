<table class="table table-bordered border-white">
    <thead class="bg-primary text-white text-center">
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Jam</th>
            <th scope="col">Nama Tempat</th>
            <th scope="col">Alamat</th>
            <th scope="col">Suhu Tubuh (Celcius)</th>
            <th scope="col">Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($catatans as $catatan)
            <tr>
                <th>{{ $no++ }}</th>
                <td>{{ date('d F Y', strtotime($catatan->tanggal_perjalanan)) }}</td>
                <td>{{ date('H : i', strtotime($catatan->jam_perjalanan)) }}</td>
                <td>{{ $catatan->nama_tempat }}</td>
                <td>{{ $catatan->alamat }}</td>
                <td>{{ $catatan->suhu_tubuh }}&#176;</td>
                <td>{!! $catatan->deskripsi !!}</td>
        @endforeach
    </tbody>
</table>

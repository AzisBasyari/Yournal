<table class="table table-bordered border-white">
    <thead class="bg-primary text-white text-center">
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Nama Tempat</th>
            <th>Alamat</th>
            <th>Suhu Tubuh (Celcius)</th>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($catatans as $catatan)

        <tr>
            <th>{{ $no++ }}</th>
            <td>{{ date('d F Y', strtotime($catatan->tanggal_perjalanan)) }}</td>
            <td>{{ date('H : i', strtotime($catatan->jam_perjalanan)) }}</td>
            <td>{{ $catatan->nama_tempat }}</td>
            <td>{{ $catatan->alamat }}</td>
            <td>{{ $catatan->suhu_tubuh }}&#176;</td>
            <td>{!! $catatan->deskripsi !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>
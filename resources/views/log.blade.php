@if (session()->has('delete-log-success'))
    <div class="alert alert-primary mt-5 fade show d-flex justify-content-between" role="alert">
        {{ session('delete-log-success') }}
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
@elseif(session()->has('delete-log-error'))
    <div class="alert alert-danger mt-5 fade show d-flex justify-content-between" role="alert">
        {{ session('delete-log-error') }}
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
@endif

<section class="mt-5">
    <h1 class="fs-36">Log</h1>
</section>

<section class="mt-5">
    <table class="table table-bordered border-white">
        <thead class="bg-primary text-white">
            <tr>
                <th>No.</th>
                <th>Aktivitas</th>
                <th>Pada</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $log->aktivitas }}</td>
                <td>{{ date('d F Y | H : i', strtotime($log->created_at)) }}</td>
                <td>
                    <a href="/detail-log/log-{{ $log->id }}" role="button">
                        <img src="{{ asset('assets/eye-24.png') }}" alt="">
                    </a>
                </td>
                <td>
                    <form action="/delete-log/{{ $log->id }}" method="post">
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
            {{ $logs->links('partials.pagination') }}
        </div>
    </div>+
</section>
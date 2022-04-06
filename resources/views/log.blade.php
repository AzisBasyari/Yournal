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
                        <a href="/detail-log/log-{{ $log->id }}" role="button">
                            <img src="https://img.icons8.com/material-rounded/24/80B5DF/eye.png">
                        </a>
                    </td>
                    <td>
                        <form action="/delete-log/{{ $log->id }}" method="POST">
                            @csrf
                            <button type="submit" class="btn p-0 m-0">
                                <img src="https://img.icons8.com/material-rounded/24/80B5DF/trash.png">
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
    </div>
</section>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary py-2 mb-5">
    <div class="container">
        <a class="navbar-brand fs-24" href="#">{{ $title }}</a>

        @auth
            <button type="button" class="btn btn-light text-dark rounded-pill fs-sans px-5 py-2 my-0 fs-14"
                data-bs-toggle="modal" data-bs-target="#logout">
                Keluar
            </button>
        @else
            <div class="justify-content-end">

                <button type="button"
                    class="btn btn-primary border border-white border-2 text-light rounded-pill px-5 py-2 my-0 fs-14 fs-sans"
                    data-bs-toggle="modal" data-bs-target="#register">Daftar</button>
                <button type="button" class="btn btn-light rounded-pill px-5 py-2 my-0 fs-14 fs-sans" data-bs-toggle="modal"
                    data-bs-target="#login">Masuk</button>
            </div>
        @endauth
    </div>

    <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-3" style="border-radius: 30px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <div class="modal-body fs-sans">
                        Anda yakin ingin keluar?
                    </div>
                    <div class="modal-footer fs-sans">
                        <button type="button" class="btn btn-outline-primary text-dark rounded-pill px-5"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary text-light rounded-pill px-5">Keluar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</nav>

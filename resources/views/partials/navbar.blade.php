<nav class="navbar navbar-expand-lg navbar-dark bg-primary py-2 mb-5">
    <div class="container">
        <a href="#" class="navbar-brand fs-24">
            {{ $title }}
        </a>

        @auth
            <button class="btn btn-light text-dark rounded-pill fs-sans px-5 py-2 my-0 fs-14" type="button" data-bs-toggle="modal" data-bs-target="#logout">
                Keluar
            </button>
        @else
            <div class="justify-content-end">
                <button class="btn btn-primary text-light border borer-white border-2 rounded-pill fs-sans px-5 py-2 my-0 fs-14" type="button" data-bs-toggle="modal" data-bs-target="#register">
                    Daftar
                </button>
                <button class="btn btn-light rounded-pill fs-sans px-5 py-2 my-0 fs-14" type="button" data-bs-toggle="modal" data-bs-target="#login">
                    Masuk
                </button>
            </div>
        @endauth
    </div>
</nav>

<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="labelLogout" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3" style="border-radius: 30px">
            <div class="modal-header">
                <h5 class="modal-title fs-24" id="labelLogout">Keluar</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <div class="modal-body fs-sans">
                        Anda yakin ingin keluar?
                    </div>
                    <div class="modal-footer fs-sans">
                        <button class="btn btn-outline-primary rounded-pill px-5" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary text-light rounded-pill px-5" type="submit">Keluar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
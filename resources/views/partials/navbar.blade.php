<nav class="navbar navbar-expand-lg navbar-dark bg-primary py-2 mb-5">
    <div class="container">
        <a class="navbar-brand fs-24" href="#">{{ $title }}</a>
        
        @auth
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-light text-dark rounded-pill fs-sans px-5 py-2 my-0 fs-14">
                Keluar
            </button>
        </form>
        @else
        <div class="justify-content-end">

            <button type="button" class="btn btn-primary border border-white border-2 text-light rounded-pill px-5 py-2 my-0 fs-14 fs-sans" data-bs-toggle="modal"
            data-bs-target="#register">Daftar</button>    
            <button type="button" class="btn btn-light rounded-pill px-5 py-2 my-0 fs-14 fs-sans" data-bs-toggle="modal"
            data-bs-target="#login">Masuk</button>    
        </div>
        @endauth
    </div>
</nav>
@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <section class="container" id="title">
        @if (session()->has('register-success'))
            <div class="alert alert-primary fade show d-flex justify-content-between" role="alert">
                {{ session('register-success') }}
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @elseif(session()->has('register-error'))
            <div class="alert alert-danger fade show d-flex justify-content-between" role="alert">
                {{ session('register-error') }}
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger fade show d-flex justify-content-between" role="alert">
                <ol>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ol>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @endif

        <div class="row row-cols-2">
            <div class="col">
                <h1 class="fs-72">{{ $title }}</h1>
                <p class="fs-24 fs-sans">
                    Catat semua perjalanan harian anda dengan cara yang mudah dan menyenangkan.
                </p>
                <div class="row align-items-end justify-content-center">
                    <div class="col-auto">
                        <a href="#feature">
                            <img src="{{ asset('assets/double-down.png') }}" alt="" class="d-block col animated bounce" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <img src="{{ asset('assets/home-animate.svg') }}" alt="" />
            </div>
        </div>
    </section>

    <section class="container" id="feature" style="margin-top: 20vh">
        <div class="row justify-content-center">
            <div class="col mb-4">
                <h1 class="fs-64 text-center">Fitur</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mx-auto text-center bg-primary fs-sans text-light py-4"
                    style="height: 80vh; width: 28vw; border-radius:50px; box-shadow: 10px 20px 10px 0 rgba(128, 181, 223, 0.5);">
                    <div class="card-body">
                        <h1 class="fs-24 card-title">CATAT PERJALANAN ANDA</h1>
                        <img src="{{ asset('assets/feature-1.svg') }}" alt="">
                        <p class="fs-18 card-text mt-3">Anda dapat mencatat seluruh perjalanan anda ke mana pun dan kapan
                            pun dengan mudah dan menyenangkan.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mx-auto text-center bg-primary fs-sans text-light py-4"
                    style="height: 80vh; width: 28vw; border-radius:50px; box-shadow: 10px 20px 10px 0 rgba(128, 181, 223, 0.5);">
                    <div class="card-body">
                        <h1 class="fs-24 card-title">LIHAT RIWAYAT CATATAN</h1>
                        <img src="{{ asset('assets/feature-2.svg') }}" alt="" class="my-5">
                        <p class="fs-18 card-text mt-3">Lihat kembali seluruh catatan perjalanan yang telah anda buat
                            sebelumnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container" style="margin-top: 20vh">
            <div class="card bg-primary text-light p-5"
                style="border-radius:50px; box-shadow: 10px 20px 10px 0 rgba(128, 181, 223, 0.5);">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset('assets/join-now.svg') }}" alt="">
                        </div>
                        <div class="col align-self-center text-end">
                            <h1 class="fs-48 mb-3">Ayo mulai mencatat dari sekarang!</h1>
                            <button class="btn btn-light rounded-pill fs-sans w-100" type="button" data-bs-toggle="modal"
                                data-bs-target="#login">
                                Masuk
                            </button>
                            <p class="fs-14 text-center my-3">atau</p>
                            <button class="btn btn-light rounded-pill fs-sans w-100" type="button" data-bs-toggle="modal"
                                data-bs-target="#register">
                                Daftar sebagai pengguna baru
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-primary text-light" style="margin-top: 20vh">
        <div class="container">
            <div class="d-flex justify-content-between pt-3 pb-0">
                <p class="fs-14">Dibuat oleh ssiz.</p>
                <p class="fs-14">Untuk Keperluan Uji Kompetensi Keahlian Rekayasa Perangkat Lunak 2022.</p>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="labelLogin" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-3" style="border-radius: 30px">
                <div class="modal-header">
                    <h5 class="modal-title fs-24" id="labelLogin">Masuk</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="container mb-3">
                            <p class="fs-14 mb-0">NIK</p>
                            <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukkan NIK anda">
                        </div>
                        <div class="container mb-3">
                            <p class="fs-14 mb-0">Kata Sandi</p>
                            <div class="input-group">
                                <input type="password" name="password" id="passwordLogin" class="form-control password"
                                    placeholder="Masukkan kata sandi anda">
                                <span class="input-group-text">
                                    <button class="btn btn-sm p-0" type="button">
                                        <img src="{{ asset('assets/hide-24.png') }}" alt="" id="togglePasswordLogin">
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-primary text-dark rounded-pill px-5" type="button"
                                data-bs-toggle="modal" data-bs-target="#register" data-bs-dismiss="modal">
                                Daftar
                            </button>
                            <button class="btn btn-primary text-light rounded-pill px-5" type="submit">
                                Masuk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="labelRegister" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-3" style="border-radius: 30px">
                <div class="modal-header">
                    <h5 class="modal-title fs-24" id="labelRegister">Daftar</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="container mb-3">
                            <p class="fs-14 mb-0">NIK</p>
                            <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukkan NIK anda">
                        </div>
                        <div class="container mb-3">
                            <p class="fs-14 mb-0">Nama Lengkap</p>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
                                placeholder="Masukkan nama lengkap anda">
                        </div>
                        <div class="container mb-3">
                            <p class="fs-14 mb-0">Kata Sandi</p>
                            <div class="input-group">
                                <input type="password" name="password" id="passwordRegister" class="form-control"
                                    placeholder="Masukkan kata sandi anda">
                                <span class="input-group-text">
                                    <button class="btn btn-sm p-0" type="button">
                                        <img src="{{ asset('assets/hide-24.png') }}" alt="" id="togglePasswordRegister">
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="container mb-3">
                            <p class="fs-14 mb-0">Konfirmasi Kata Sandi</p>
                            <div class="input-group">
                                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control"
                                    placeholder="Masukkan kata sandi anda">
                                <span class="input-group-text">
                                    <button class="btn btn-sm p-0" type="button">
                                        <img src="{{ asset('assets/hide-24.png') }}" alt="" id="toggleConfirmPassword">
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-primary text-dark rounded-pill px-5" type="button"
                                data-bs-toggle="modal" data-bs-target="#login" data-bs-dismiss="modal">
                                Masuk
                            </button>
                            <button class="btn btn-primary text-light rounded-pill px-5" type="submit">
                                Daftar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const passwordLogin = document.querySelector('#passwordLogin');
        const passwordRegister = document.querySelector('#passwordRegister');
        const confirmPassword = document.querySelector('#confirmPassword');

        togglePasswordLogin.addEventListener("click", function() {
            const type = passwordLogin.getAttribute("type") === "password" ? "text" : "password";
            passwordLogin.setAttribute("type", type);

            if (togglePasswordLogin.src.match('assets/hide-24.png')) {
                togglePasswordLogin.src = 'assets/eye-24.png';
            } else {
                togglePasswordLogin.src = 'assets/hide-24.png';
            }
        })
        togglePasswordRegister.addEventListener("click", function() {
            const type = passwordRegister.getAttribute("type") === "password" ? "text" : "password";
            passwordRegister.setAttribute("type", type);

            if (togglePasswordRegister.src.match('assets/hide-24.png')) {
                togglePasswordRegister.src = 'assets/eye-24.png';
            } else {
                togglePasswordRegister.src = 'assets/hide-24.png';
            }
        })
        toggleConfirmPassword.addEventListener("click", function() {
            const type = confirmPassword.getAttribute("type") === "password" ? "text" : "password";
            confirmPassword.setAttribute("type", type);

            if (toggleConfirmPassword.src.match('assets/hide-24.png')) {
                toggleConfirmPassword.src = 'assets/eye-24.png';
            } else {
                toggleConfirmPassword.src = 'assets/hide-24.png';
            }
        })
    </script>
@endsection

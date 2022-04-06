@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="css/index.css">
@endsection

@section('content')
    <section class="container" id="title">
        @if (session()->has('register-success'))
            <div class="alert alert-primary fade show d-flex justify-content-between" role="alert">
                {{ session('register-success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session()->has('register-error'))
            <div class="alert alert-primary fade show d-flex justify-content-between" role="alert">
                {{ session('register-error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session()->has('login-error'))
            <div class="alert alert-primary fade show d-flex justify-content-between" role="alert">
                {{ session('login-error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row row-cols-2">
            <div class="col">
                <h1 class="fs-72">{{ $title }}</h1>
                <p class="fs-24 fs-sans">Catat semua perjalanan harian anda dengan cara yang mudah dan menyenangkan.</p>
                <div class="row align-items-end justify-content-md-center">
                    <div class="col-md-auto">
                        <a href="#feature">
                            <img src="https://img.icons8.com/material-rounded/48/80B5DF/double-down.png"
                                class="d-block col animated bounce" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <img src="assets/home-animate.svg" alt="">
                {{-- <a href="https://storyset.com/people">People illustrations by Storyset</a> --}}
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
                    style="height: 80vh; width: 28vw; border-radius: 50px; box-shadow: 10px 20px 10px 0 rgba(128, 181, 223, 0.5);">
                    <div class="card-body">
                        <h1 class="fs-24 card-title">
                            <strong>
                                CATAT PERJALANAN ANDA
                            </strong>
                        </h1>
                        {{-- <a href="https://storyset.com/work">Work illustrations by Storyset</a> --}}
                        <img src="assets/feature-1.svg" alt="">
                        <p class="fs-18 card-text mt-3">Anda dapat mencatat seluruh perjalanan anda ke mana pun dan kapan
                            pun dengan mudah dan menyenangkan.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mx-auto text-center bg-primary fs-sans text-light py-4"
                    style="height: 80vh; width: 28vw; border-radius: 50px; box-shadow: 10px 20px 10px 0 rgba(128, 181, 223, 0.5);">
                    <div class="card-body">
                        <h1 class="fs-24 card-title">
                            <strong>
                                LIHAT RIWAYAT CATATAN
                            </strong>
                        </h1>
                        {{-- <a href="https://storyset.com/people">People illustrations by Storyset</a> --}}
                        <img src="assets/feature-2.svg" alt="" class="my-3">
                        <p class="fs-18 card-text mt-3">Lihat kembali seluruh catatan perjalanan yang telah anda buat
                            sebelumnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container" id="join-now" style="margin-top: 20vh">
        <div class="card bg-primary text-light p-5"
            style="border-radius: 50px; box-shadow: 10px 20px 10px 0 rgba(128, 181, 223, 0.5);">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <img src="assets/join-now.svg" alt="">
                    </div>
                    <div class="col align-self-center text-end ">
                        <h1 class="fs-48 mb-3">Mulailah mencatat dari sekarang!</h1>
                        <button type="button" class="btn btn-light rounded-pill fs-sans" style="width: 100%"
                            data-bs-toggle="modal" data-bs-target="#login">Masuk</button>
                        <p class="fs-14 text-center my-3">Atau</p>
                        <button type="button" class="btn btn-light rounded-pill fs-sans" style="width: 100%"
                            data-bs-toggle="modal" data-bs-target="#register">Daftar sebagai
                            pengguna baru</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Login Modal -->
        <div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content p-3" style="border-radius: 30px">
                    <div class="modal-header">
                        <h5 class="modal-title fs-24" id="loginLabel">Masuk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('login-post') }}">
                            @csrf

                            <div class="container mb-3">
                                <p class="fs-14 mb-0">NIK</p>
                                <input type="text" class="form-control" id="nik" name="nik"
                                    placeholder="Masukkan NIK anda" autofocus required>
                            </div>
                            <div class="container">
                                <p class="fs-14 mb-0">Kata Sandi</p>
                                <div class="input-group">
                                    <input type="password" class="form-control password" id="passwordLogin" name="password"
                                        placeholder="Masukkan kata sandi anda" required>
                                    <span class="input-group-text">
                                        <button type="button" class="btn btn-sm p-0"><img
                                                src="https://img.icons8.com/material-rounded/24/80B5DF/hide.png"
                                                id="togglePasswordLogin" /></button>
                                        {{-- <i class="bi bi-eye-slash input-group-text" id="togglePassword"></i> --}}
                                    </span>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary text-dark" data-bs-target="#register"
                            data-bs-toggle="modal" data-bs-dismiss="modal">Daftar</button>
                        <button type="submit" class="btn btn-primary text-light">Masuk</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Register Modal -->
        <div class="modal fade" id="register" tabindex="-1" aria-labelledby="registerLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content p-3" style="border-radius: 30px">
                    <div class="modal-header">
                        <h5 class="modal-title fs-24" id="registerLabel">Daftar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('register-post') }}">
                            @csrf
                            <div class="container mb-3">
                                <p class="fs-14 mb-0">NIK</p>
                                <input type="text" class="form-control" id="nik" name='nik'
                                    placeholder="Masukkan NIK anda">
                            </div>
                            <div class="container mb-3">
                                <p class="fs-14 mb-0">Nama Lengkap</p>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                    placeholder="Masukkan nama lengkap anda">
                            </div>
                            <div class="container mb-3">
                                <p class="fs-14 mb-0">Kata Sandi</p>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control password"
                                        id="passwordRegister" placeholder="Masukkan kata sandi anda">
                                    <span class="input-group-text">
                                        <button type="button" class="btn btn-sm p-0"><img
                                                src="https://img.icons8.com/material-rounded/24/80B5DF/hide.png"
                                                id="togglePasswordRegister" /></button>
                                        {{-- <i class="bi bi-eye-slash input-group-text" id="togglePassword"></i> --}}
                                    </span>
                                </div>
                                <span class="text-danger">*Kata sandi minimal 8 karakter</span>
                            </div>
                            <div class="container">
                                <p class="fs-14 mb-0">Konfirmasi Kata Sandi</p>
                                <div class="input-group">
                                    <input type="password" name="confirmPassword" class="form-control password"
                                        id="confirmPassword" placeholder="Konfirmasi kata sandi anda">
                                    <span class="input-group-text">
                                        <button type="button" class="btn btn-sm p-0"><img
                                                src="https://img.icons8.com/material-rounded/24/80B5DF/hide.png"
                                                id="toggleConfirmPasswordRegister" /></button>
                                        {{-- <i class="bi bi-eye-slash input-group-text" id="togglePassword"></i> --}}
                                    </span>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary text-dark" data-bs-target="#login"
                            data-bs-toggle="modal" data-bs-dismiss="modal">Masuk</button>
                        <button type="submit" class="btn btn-primary text-light">Daftar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


    </section>

    <footer class="bg-primary text-light" style="margin-top: 20vh">
        <div class="container">
            <div class="d-flex flex-row justify-content-between pt-3 pb-0">
                <p class="fs-14">Dibuat oleh ssiz.</p>
                <p class="fs-14">Untuk Keperluan Uji Kompetensi Keahlian Rekayasa Perangkat Lunak 2022.</p>
            </div>
        </div>
    </footer>

    <script>
        // const togglePasswordLogin = document.querySelector("#togglePasswordLogin");
        const passwordLogin = document.querySelector("#passwordLogin");
        const passwordRegister = document.querySelector("#passwordRegister");
        const confirmPasswordRegister = document.querySelector("#confirmPassword");

        togglePasswordLogin.addEventListener("click", function() {
            // toggle the type attribute
            const type = passwordLogin.getAttribute("type") === "password" ? "text" : "password";
            passwordLogin.setAttribute("type", type);

            // toggle the icon
            if (togglePasswordLogin.src.match(
                    "https://img.icons8.com/material-rounded/24/80B5DF/hide.png")) {
                togglePasswordLogin.src =
                    "https://img.icons8.com/material-rounded/24/80B5DF/eye.png";
            } else {
                togglePasswordLogin.src =
                    "https://img.icons8.com/material-rounded/24/80B5DF/hide.png";
            }
        });

        togglePasswordRegister.addEventListener("click", function() {
            // toggle the type attribute
            const type = passwordRegister.getAttribute("type") === "password" ? "text" : "password";
            passwordRegister.setAttribute("type", type);

            // toggle the icon
            if (togglePasswordRegister.src.match(
                    "https://img.icons8.com/material-rounded/24/80B5DF/hide.png")) {
                togglePasswordRegister.src =
                    "https://img.icons8.com/material-rounded/24/80B5DF/eye.png";
            } else {
                togglePasswordRegister.src =
                    "https://img.icons8.com/material-rounded/24/80B5DF/hide.png";
            }
        });

        toggleConfirmPasswordRegister.addEventListener("click", function() {
            // toggle the type attribute
            const type = confirmPasswordRegister.getAttribute("type") === "password" ? "text" : "password";
            confirmPasswordRegister.setAttribute("type", type);

            // toggle the icon
            if (toggleConfirmPasswordRegister.src.match(
                    "https://img.icons8.com/material-rounded/24/80B5DF/hide.png")) {
                toggleConfirmPasswordRegister.src =
                    "https://img.icons8.com/material-rounded/24/80B5DF/eye.png";
            } else {
                toggleConfirmPasswordRegister.src =
                    "https://img.icons8.com/material-rounded/24/80B5DF/hide.png";
            }
        });
    </script>
@endsection

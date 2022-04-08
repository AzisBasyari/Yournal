@if (session()->has('update-success'))
    <div class="alert alert-primary mt-5" role="alert">
        {{ session('update-success') }}
    </div>
@elseif(session()->has('update-error'))
    <div class="alert alert-primary mt-5" role="alert">
        {{ session('update-error') }}
    </div>
@endif

@if (session()->has('update-password-success'))
    <div class="alert alert-primary mt-5" role="alert">
        {{ session('update-password-success') }}
    </div>
@elseif(session()->has('update-password-error'))
    <div class="alert alert-primary mt-5" role="alert">
        {{ session('update-password-error') }}
    </div>
@endif

<section class="mt-5">
    <h1 class="fs-36">Profil</h1>
</section>

<section class="mt-5">
    <div class="col-lg-8">
        <form action="/profile/edit/{{ auth()->user()->nik }}" method="post">
            @csrf
            <div class="mb-5">
                <label for="nik" class="fs-18 mb-2">NIK</label>
                <input type="text" name="nik" id="formCatatan" class="form-control" placeholder="Masukkan NIK Anda"
                    value="{{ auth()->user()->nik }}" required>
            </div>
            <div class="mb-5">
                <label for="nama_lengkap" class="fs-18 mb-2">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="formCatatan" class="form-control"
                    placeholder="Masukkan Nama Lengkap Anda" value="{{ auth()->user()->nama_lengkap }}" required>
            </div>
            <div class="mb-5 d-flex justify-content-end">
                <button type="button" class="btn btn-white rounded-pill border border-2 border-primary me-3 px-5 py-2"
                    data-bs-toggle="modal" data-bs-target="#changePassword">Ganti Kata Sandi</button>
                <button type="submit" class="btn btn-primary rounded-pill text-white px-5 py-2">Edit Profil</button>
            </div>
        </form>
    </div>
</section>

<div class="modal fade" id="changePassword" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3" style="border-radius: 30px">
            <div class="modal-header">
                <h5 class="modal-title fs-24" id="loginLabel">Masuk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/profile/edit-password">
                    @csrf

                    <div class="container mb-3">
                        <p class="fs-14 mb-0">Kata Sandi Saat Ini</p>
                        <div class="input-group">
                            <input type="password" class="form-control password" id="password" name="password"
                                placeholder="Masukkan kata sandi anda saat ini" required>
                            <span class="input-group-text">
                                <button type="button" class="btn btn-sm p-0"><img
                                        src="https://img.icons8.com/material-rounded/24/80B5DF/hide.png"
                                        id="togglePassword" /></button>
                                {{-- <i class="bi bi-eye-slash input-group-text" id="togglePassword"></i> --}}
                            </span>
                        </div>
                    </div>
                    <div class="container mb-3">
                        <p class="fs-14 mb-0">Kata Sandi Baru</p>
                        <div class="input-group">
                            <input type="password" class="form-control password" id="newPassword" name="newPassword"
                                placeholder="Masukkan kata sandi baru anda" required>
                            <span class="input-group-text">
                                <button type="button" class="btn btn-sm p-0"><img
                                        src="https://img.icons8.com/material-rounded/24/80B5DF/hide.png"
                                        id="toggleNewPassword" /></button>
                            </span>
                        </div>
                    </div>
                    <div class="container">
                        <p class="fs-14 mb-0">Konfirmasi Kata Sandi Baru</p>
                        <div class="input-group">
                            <input type="password" class="form-control password" id="confirmNewPassword" name="confirmNewPassword"
                                placeholder="Konfirmasi kata sandi baru anda" required>
                            <span class="input-group-text">
                                <button type="button" class="btn btn-sm p-0"><img
                                        src="https://img.icons8.com/material-rounded/24/80B5DF/hide.png"
                                        id="toggleConfirmNewPassword" /></button>
                            </span>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary text-dark" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary text-light">Perbaharui Kata Sandi</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    const password = document.querySelector("#password");
    const newPassword = document.querySelector("#newPassword");
    const confirmNewPassword = document.querySelector("#confirmNewPassword");

    togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            if (togglePassword.src.match(
                    "https://img.icons8.com/material-rounded/24/80B5DF/hide.png")) {
                togglePassword.src =
                    "https://img.icons8.com/material-rounded/24/80B5DF/eye.png";
            } else {
                togglePassword.src =
                    "https://img.icons8.com/material-rounded/24/80B5DF/hide.png";
            }
        });
    toggleNewPassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = newPassword.getAttribute("type") === "password" ? "text" : "password";
            newPassword.setAttribute("type", type);

            // toggle the icon
            if (toggleNewPassword.src.match(
                    "https://img.icons8.com/material-rounded/24/80B5DF/hide.png")) {
                toggleNewPassword.src =
                    "https://img.icons8.com/material-rounded/24/80B5DF/eye.png";
            } else {
                toggleNewPassword.src =
                    "https://img.icons8.com/material-rounded/24/80B5DF/hide.png";
            }
        });
    toggleConfirmNewPassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = confirmNewPassword.getAttribute("type") === "password" ? "text" : "password";
            confirmNewPassword.setAttribute("type", type);

            // toggle the icon
            if (toggleConfirmNewPassword.src.match(
                    "https://img.icons8.com/material-rounded/24/80B5DF/hide.png")) {
                toggleConfirmNewPassword.src =
                    "https://img.icons8.com/material-rounded/24/80B5DF/eye.png";
            } else {
                toggleConfirmNewPassword.src =
                    "https://img.icons8.com/material-rounded/24/80B5DF/hide.png";
            }
        });
</script>

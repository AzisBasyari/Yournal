@if (session()->has('update-profile-success'))
    <div class="alert alert-primary mt-5 fade show d-flex justify-content-between" role="alert">
        {{ session('update-profile-success') }}
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
@elseif(session()->has('update-profile-error'))
    <div class="alert alert-danger mt-5 fade show d-flex justify-content-between" role="alert">
        {{ session('update-profile-error') }}
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
@endif

@if (session()->has('update-password-success'))
    <div class="alert alert-primary fade show d-flex justify-content-between" role="alert">
        {{ session('update-password-success') }}
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
@elseif(session()->has('update-password-error'))
    <div class="alert alert-danger fade show d-flex justify-content-between" role="alert">
        {{ session('update-password-error') }}
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
@endif

<section class="mt-5">
    <h1 class="fs-36">Profil</h1>
</section>

<section class="mt-5">
    <div class="col-lg-8">
        <form action="{{ route('edit-profile') }}" method="post">
            @csrf
            <div class="mb-5">
                <label for="nik" class="fs-18 mb-2">NIK</label>
                <input type="text" name="nik" id="formCatatan" class="form-control" value="{{ auth()->user()->nik }}" required>
            </div>
            <div class="mb-5">
                <label for="nama_lengkap" class="fs-18 mb-2">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="formCatatan" class="form-control" value="{{ auth()->user()->nama_lengkap }}" required>
            </div>
            <div class="mb-5 d-flex justify-content-end">
                <button class="btn btn-white rounded-pill border border-2 border-primary me-3 px-5 py-2" type="button" data-bs-toggle="modal" data-bs-target="#changePassword">
                    Ubah Kata Sandi
                </button>
                <button class="btn btn-primary rounded-pill text-white px-5 py-2" type="submit">
                    Edit
                </button>
            </div>
        </form>
    </div>
</section>

<div class="modal fade" id="changePassword" tabindex="-1" aria-labelledby="labelChangePassword" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3" style="border-radius: 30px">
            <div class="modal-header">
                <h5 class="modal-title fs-24" id="labelChangePassword">Ubah Kata Sandi</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('edit-password') }}" method="post">
                    @csrf
                    <div class="container mb-3">
                        <p class="fs-14 mb-0">Kata Sandi Saat Ini</p>
                        <div class="input-group">
                            <input type="password" name="password" id="currentPass" class="form-control" placeholder="Masukkan kata sandi anda saat ini">
                            <span class="input-group-text">
                                <button class="btn btn-sm p-0" type="button">
                                    <img src="{{ asset('assets/hide-24.png') }}" alt="" id="toggleCurrentPass">
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="container mb-3">
                        <p class="fs-14 mb-0">Kata Sandi Baru</p>
                        <div class="input-group">
                            <input type="password" name="newPassword" id="changePass" class="form-control" placeholder="Masukkan kata sandi baru anda">
                            <span class="input-group-text">
                                <button class="btn btn-sm p-0" type="button">
                                    <img src="{{ asset('assets/hide-24.png') }}" alt="" id="toggleChangePass">
                                </button>
                            </span>
                        </div>
                        <span class="text-danger">*Kata sandi minimal 8 karakter</span>
                    </div>
                    <div class="container mb-3">
                        <p class="fs-14 mb-0">Konfirmasi Kata Sandi</p>
                        <div class="input-group">
                            <input type="password" name="confirmNewPassword" id="confirmChangePassword" class="form-control" placeholder="Konfirmasi kata sandi anda">
                            <span class="input-group-text">
                                <button class="btn btn-sm p-0" type="button">
                                    <img src="{{ asset('assets/hide-24.png') }}" alt="" id="toggleConfirmChangePassword">
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-primary text-dark rounded-pill px-5" type="button" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button class="btn btn-primary text-light rounded-pill px-5" type="submit">
                            Ubah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const currentPass = document.querySelector('#currentPass');
    const changePass = document.querySelector('#changePass');
    const confirmChangePassword = document.querySelector('#confirmChangePassword');

    toggleCurrentPass.addEventListener("click", function(){
        const type = currentPass.getAttribute("type") === "password" ? "text" : "password";
        currentPass.setAttribute("type", type);

        if(toggleCurrentPass.src.match('assets/hide-24.png')){
            toggleCurrentPass.src = 'assets/eye-24.png';
        } else {
            toggleCurrentPass.src = 'assets/hide-24.png';
        }
    })
    toggleChangePass.addEventListener("click", function(){
        const type = changePass.getAttribute("type") === "password" ? "text" : "password";
        changePass.setAttribute("type", type);

        if(toggleChangePass.src.match('assets/hide-24.png')){
            toggleChangePass.src = 'assets/eye-24.png';
        } else {
            toggleChangePass.src = 'assets/hide-24.png';
        }
    })
    toggleConfirmChangePassword.addEventListener("click", function(){
        const type = confirmChangePassword.getAttribute("type") === "password" ? "text" : "password";
        confirmChangePassword.setAttribute("type", type);

        if(toggleConfirmChangePassword.src.match('assets/hide-24.png')){
            toggleConfirmChangePassword.src = 'assets/eye-24.png';
        } else {
            toggleConfirmChangePassword.src = 'assets/hide-24.png';
        }
    })
</script>
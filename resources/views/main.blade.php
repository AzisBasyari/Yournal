@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/create.css">
    <link rel="stylesheet" type="text/css" href="css/trix.css">
    <script type="text/javascript" src="js/trix.js"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2">
                <div class="card bg-primary p-2 pb-0 mt-0" style="width: 10rem; border-radius: 50rem 50rem 5rem 5rem">
                    <img src="assets/gengar.png" alt="">
                </div>
            </div>
            <div class="col">
                <h1 class="fs-24 fs-sans">Selamat Datang</h1>
                <h1 class="fs-48">{{ auth()->user()->nama_lengkap }}</h1>
                <ul class="nav nav-pills mt-4" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active border border-primary border-2 rounded-pill fs-14 text-center me-3"
                            id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" 
                            aria-controls="pills-home" aria-selected="true">Halaman Utama</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link border border-primary border-2 rounded-pill fs-14 text-center me-3"
                            id="pills-create-tab" data-bs-toggle="pill" data-bs-target="#pills-create" type="button"
                            role="tab" aria-controls="pills-create" aria-selected="false">Buat Catatan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link border border-primary border-2 rounded-pill fs-14 text-center me-3"
                            id="pills-manage-tab" data-bs-toggle="pill" data-bs-target="#pills-manage" type="button"
                            role="tab" aria-controls="pills-manage" aria-selected="false">Kelola Catatan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link border border-primary border-2 rounded-pill fs-14 text-center me-3"
                            id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                            role="tab" aria-controls="pills-profile" aria-selected="false">Profil</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link border border-primary border-2 rounded-pill fs-14 text-center me-3"
                            id="pills-log-tab" data-bs-toggle="pill" data-bs-target="#pills-log" type="button"
                            role="tab" aria-controls="pills-log" aria-selected="false">Log</button>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    @include('home')</div>
                <div class="tab-pane fade" id="pills-create" role="tabpanel" aria-labelledby="pills-create-tab">
                    @include('create')</div>
                <div class="tab-pane fade" id="pills-manage" role="tabpanel" aria-labelledby="pills-manage-tab">
                    @include('manage')</div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @include('profile')
                </div>
                <div class="tab-pane fade" id="pills-log" role="tabpanel" aria-labelledby="pills-log-tab">
                    @include('log')
                </div>
            </div>
        </div>

        
    </div>
@endsection

@section('js')


<script type="text/javascript">
    $(document).ready(function() {
        $('button[data-bs-toggle="pill"]').on('shown.bs.tab', function(e) {
            console.log(this);
            e.preventDefault();
            sessionStorage.setItem('activeTab', $(e.target).attr('data-bs-target'));
        });

        // Here, save the index to which the tab corresponds. You can see it 
        // in the chrome dev tool.
        var activeTab = sessionStorage.getItem('activeTab');

        // In the console you will be shown the tab where you made the last 
        // click and the save to "activeTab". I leave the console for you to 
        // see. And when you refresh the browser, the last one where you 
        // clicked will be active.
        

        if (activeTab) {
            $('button[data-bs-target="' + activeTab + '"]').tab('show');
        }
    });

    function tabs_shown(e){
        console.log(e);
        e.preventDefault();
    }
</script>
@endsection

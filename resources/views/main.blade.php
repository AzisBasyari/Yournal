@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">

    <link rel="stylesheet" href="{{ asset('css/trix.css') }}">
    <script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>

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
                <img src="{{ asset('assets/typewriter-animate.svg') }}" alt="">
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
                            id="pills-log-tab" data-bs-toggle="pill" data-bs-target="#pills-log" type="button" role="tab"
                            aria-controls="pills-log" aria-selected="false">Log</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link border border-primary border-2 rounded-pill fs-14 text-center me-3"
                            id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                            role="tab" aria-controls="pills-profile" aria-selected="false">Profil</button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                @include('home')
            </div>
            <div class="tab-pane fade" id="pills-create" role="tabpanel" aria-labelledby="pills-create-tab">
                @include('create')
            </div>
            <div class="tab-pane fade" id="pills-manage" role="tabpanel" aria-labelledby="pills-manage-tab">
                @include('manage')
            </div>
            <div class="tab-pane fade" id="pills-log" role="tabpanel" aria-labelledby="pills-log-tab">
                @include('log')
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                @include('profile')
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('button[data-bs-toggle="pill"]').on('shown.bs.tab', function(e){
                e.preventDefault();
                sessionStorage.setItem('activeTab', $(e.target).attr('data-bs-target'));
            });

            var activeTab = sessionStorage.getItem('activeTab');

            if(activeTab){
                $('button[data-bs-target="' + activeTab + '"]').tab('show');
            }
        });
    </script>    
@endsection

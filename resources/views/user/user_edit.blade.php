@extends('layouts.app')
@section('content')
<div class="home-content">
    <div class="content-archiveCreate">
        @include('layouts.flash-message')

        <div class="content-header">
            <a href="/user" class="btn btn-main"><i class="fa-solid fa-angle-left"></i></a>
            <h5>Edit Profil</h5>
        </div>
        <form class="row" action="/user/update-profile/{{ $user->id }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row col-8">

                {{-- Gambar Profil --}}
                {{-- <div class="image-container mt-3 mb-5">
                    <div class="image-profile">
                        <img src="/Image/Ellipse 194.png" alt="">
                    </div>
                    <div class="icon"><i class="fa-solid fa-pen-to-square"></i></div>
                </div> --}}

                {{-- Informasi Pengguna --}}
                <div class="informasi-pengguna row mb-4">
                    <h5>Informasi Pengguna</h5>
                    <!-- Bidang -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Depan</label>
                        <input type="text" name="nama_depan" class="form-control form-input @error('password') is-invalid @enderror" value="{{ $user->nama_depan }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Belakang</label>
                        <input type="text" name="nama_belakang" class="form-control" value="{{ $user->nama_belakang }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                    </div>
                </div>

                {{-- Akun --}}
                <div class="informasi-pengguna row mb-5">
                    <h5>Informasi Akun</h5>
                    <!-- Bidang -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Bidang</label>
                        <input type="text" class="form-control" value="{{ $user->unit->unit_name }}" disabled>
                    </div>

                    <div class="col-md-6 mb-3 change-password">
                        <label class="form-label">Kata Sandi</label>
                        <div class="input-button">
                            <input type="password" name="category_name" class="form-control" value="this user password" disabled>
                            <a href="" data-bs-toggle="modal" data-bs-target="#modal-change-password">Ubah kata sandi</a>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="d-grid col-md-6">
                        <button type="submit" class="btn btn-main">Batal</button>
                    </div>
                    <div class="d-grid col-md-6">
                        <button type="submit" class="btn btn-main">Simpan</button>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <!-- Modal Ubah Kata Sandi -->
    <div class="modal fade modal-md" id="modal-change-password" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-alert modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-close">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="form-body">
                    <form class="row" action="/user/change-password/{{ $user->id }}" method="post">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Kata Sandi Saat Ini</label>
                            <input type="password" name="current_password" class="form-control form-input @error('current_password') is-invalid @enderror" value="">
                            @error('current_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Kata Sandi Baru</label>
                            <input type="password" name="new_password" class="form-control form-input @error('new_password') is-invalid @enderror" value="">
                            @error('new_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Konfirmasi Kata Sandi</label>
                            <input type="password" name="new_password_confirm" class="form-control form-input @error('new_password') is-invalid @enderror" value="">
                            @error('new_password_confirm')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-button">
                            <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger btn-sm">Ganti Password</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>

    </div>
</div>
@endsection
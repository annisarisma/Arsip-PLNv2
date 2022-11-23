@extends('layouts.app')
@section('content')
<div class="home-content">
    <div class="content-archiveCreate">
        <div class="content-header">
            <a href="javascript:history.go(-1)" class="btn btn-main"><i class="fa-solid fa-angle-left"></i></a>
            <h5>Edit Profil</h5>
        </div>
        <form class="row" action="/category/category-create" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row col-8">

                {{-- Gambar Profil --}}
                <div class="image-container mt-3 mb-5">
                    <div class="image-profile">
                        <img src="/Image/Ellipse 194.png" alt="">
                    </div>
                    <div class="icon"><i class="fa-solid fa-pen-to-square"></i></div>
                </div>

                {{-- Informasi Pengguna --}}
                <div class="informasi-pengguna row mb-4">
                    <h5>Informasi Pengguna</h5>
                    <!-- Bidang -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Depan</label>
                        <select class="form-select" name="unit_id">
                            <option selected hidden>Pilih Bidang...</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Belakang</label>
                        <input type="text" name="category_name" class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" name="category_name" class="form-control">
                    </div>
                </div>

                {{-- Akun --}}
                <div class="informasi-pengguna row mb-5">
                    <h5>Informasi Pengguna</h5>
                    <!-- Bidang -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="category_name" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Bidang</label>
                        <input type="text" name="category_name" class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" name="category_name" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kata Sandi</label>
                        <input type="text" name="category_name" class="form-control" disabled>
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
</div>
@endsection
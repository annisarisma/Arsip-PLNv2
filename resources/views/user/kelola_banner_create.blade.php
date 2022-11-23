@extends('layouts.app')
@section('content')
<div class="home-content">
    <div class="content-archiveCreate">
        <div class="content-header">
            <a href="javascript:history.go(-1)" class="btn btn-main"><i class="fa-solid fa-angle-left"></i></a>
            <h5>Tambah Banner</h5>
        </div>

        <form action="/user/manage-banner-create" method="post" enctype="multipart/form-data" class="row">
            @csrf
            <div class="row col-6">

                <!-- Tipe Tampilan -->
                <div class="col-md-12 mb-3">
                    <label class="form-label">Tipe Tampilan</label>
                    <select class="form-select" name='type'>
                        <option selected hidden>Pilih Tipe...</option>
                        <option value="Dashboard">Dashboard</option>
                        <option value="Login-Regist">Daftar/Masuk</option>
                    </select>
                </div>

                <!-- Judul Banner -->
                <div class="col-md-12 mb-3">
                    <label class="form-label">Judul Banner</label>
                    <input name='title' type="text" class="form-control">
                </div>

                <!-- Deskripsi Banner -->
                <div class="col-md-12 mb-3">
                    <label class="form-label">Deskripsi Banner</label>
                    <input name='description' type="text" class="form-control">
                </div>

                <!-- Image -->
                <div class="form-group-cover">
                    <label for="image">Upload Gambar</label>
                    <div class="container-images-cover">
                        <div id="second-input-thumbnail" onclick="mainInputActiveThumbnail()" class="form-group-images-gallery">
                            <div class="image-placeholder">
                                <img id="image-thumbnail" alt="">
                            </div>
                            <div class="file-placeholder">
                                <div class="content-image-upload">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p>No file choosen!</p>
                                </div>
                                <div class="close-btn">
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>
                            <div class="image-choose-btn">
                                <input id="main-input-thumbnail" type="file" name="image" hidden>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="d-grid col-md-6">
                    <button type="submit" class="btn btn-main">Tambah Banner</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
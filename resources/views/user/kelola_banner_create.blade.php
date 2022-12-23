@extends('layouts.app')
@section('content')
<div class="home-content">
    <div class="content-archiveCreate">
        <div class="content-header">
            <a href="/user/manage-banner" class="btn btn-main"><i class="fa-solid fa-angle-left"></i></a>
            <h5>Tambah Banner</h5>
        </div>

        <form action="/user/manage-banner-create" id="form" method="post" enctype="multipart/form-data" class="row">
            @csrf
            <div class="row col-6">

                <!-- Tipe Tampilan -->
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Tipe Tampilan</label>
                    <select class="form-select form-input @error('type') is-invalid @enderror" name='type'>
                        <option selected hidden value="pilih" >Pilih Tipe...</option>
                        <option value="Dashboard">Dashboard</option>
                        <option value="Login-Regist">Daftar/Masuk</option>
                    </select>
                    @error('type')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Judul Banner -->
                <div class="col-md-12 mb-3 ">
                    <label class="form-label required">Judul Banner</label>
                    <input type="text" value="{{ old('title') }}" class="form-control form-input @error('title') is-invalid @enderror" name="title">
                    @error('title')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Deskripsi Banner -->
                <div class="col-md-12 mb-3">
                    <label class="form-label">Deskripsi Banner</label>
                    <input type="text" value="{{ old('description') }}" class="form-control form-input @error('description') is-invalid @enderror" name="description">
                    @error('description')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Image -->
                <div class="form-group-cover">
                    <label for="image required">Upload Gambar</label>
                    <sub>(Ukuran disarankan : Dashboard -> 400 x 200 px | Daftar/Masuk -> 1080 x 1920 px)</sub>
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
                                <input id="main-input-thumbnail" type="file" name="image" hidden class="form-control form-input @error('image') is-invalid @enderror">
                                @error('image')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
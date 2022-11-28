@extends('layouts.app')
@section('content')
<div class="home-content">
    <div class="content-archiveCreate">
        <div class="content-header">
            <a href="javascript:history.go(-1)" class="btn btn-main"><i class="fa-solid fa-angle-left"></i></a>
            <h5>Tambah Arsip</h5>
        </div>

        <form class="row" id="form" action="/archive/archive-create" method="post" enctype="multipart/form-data">
            @csrf   
            <div class="row col-6">

                <!-- User -->
                <div hidden class="col-md-12 mb-3">
                    <input type="text" class="form-control" name="user_id" value="{{ auth()->user()->id }}">
                </div>

                <!-- Nama Arsip -->
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Nama Arsip </label>
                    <sub>(Hindari penggunaan simbol)</sub>
                    <input type="text" class="form-control form-input @error('archive_name') is-invalid @enderror" name="archive_name">
                    @error('archive_name')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Bidang -->
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Bidang</label>
                    <select class="form-select" name="unit_id">
                        <option selected value="{{ $unit->id }}">{{$unit->unit_name}}</option>
                    </select>
                </div>

                <!-- Kategori -->
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Kategori</label>
                    <select class="form-select form-input @error('category_id') is-invalid @enderror" name="category_id">
                        <option selected hidden value="pilih">Pilih Kategori...</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Deskripsi</label>
                    <textarea class="form-control form-input @error('description') is-invalid @enderror" rows="3" name="description"></textarea>
                    @error('description')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Lengkap" checked>
                        <label class="form-check-label" for="gridRadios1">
                            Lengkap
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="Belum" value="Belum Lengkap">
                        <label class="form-check-label" for="gridRadios2">
                            Belum Lengkap
                        </label>
                    </div>
                </div>

                <!-- Keterangan Belum Lengkap -->
                <div class="col-md-12 mb-3 keterangan">
                    <label class="form-label">Keterangan</label>
                    <textarea class="form-control" rows="3" id="keterangan" name="additional_info"></textarea>
                </div>
            </div>

            <div class="row col-6">
                <div class="upload-file col-md-12">
                    <label class="form-label">Upload File</label>
                    <div class="mb-3">
                        <input type="file" name="file" id='file' class='p-5' multiple>
                    </div>

                    <!-- <div class="form-container">
                            <input class="file-input" type="file" id="file" name="file" hidden>
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Pilih File Untuk di Unggah</p>
                    </div> -->

                    <!-- <section class="progress-area">

                    </section>

                    <section class="uploaded-area">

                    </section> -->
                </div>
            </div>

            <div class="d-grid col-md-12">
                <button type="submit" class="btn btn-main">Tambah Arsip</button>
            </div>
        </form>
    </div>
</div>
@endsection
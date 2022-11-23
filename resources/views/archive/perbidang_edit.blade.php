@extends('layouts.app')
@section('content')
<div class="home-content">
    <div class="content-archiveCreate">
        <div class="content-header">
            <a href="javascript:history.go(-1)" class="btn btn-main"><i class="fa-solid fa-angle-left"></i></a>
            <h5>Edit Arsip</h5>
        </div>
        <input hidden type="text" value="{{$archive->id}}" id="archive_id" name="archive_id" >
        <input hidden type="text" value="{{$archive->unit_id}}" id="unit_id" name="unit_id">

        <form class="row" action="/archive/archive-edit/{{$archive->id}}" method="post" enctype="multipart/form-data">
            @csrf   
            <div class="row col-6">

                <!-- User -->
                <div hidden class="col-md-12 mb-3">
                    <input type="text" class="form-control" name="user_id" value="{{ auth()->user()->id }}">
                </div>

                <!-- Nama Arsip -->
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Nama Arsip</label>
                    <sub>(Hindari penggunaan simbol)</sub>
                    <input value="{{$archive->archive_name}}" type="text" class="form-control form-input @error('archive_name') is-invalid @enderror" name="archive_name">
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
                        <option selected value="{{ $archive->unit_id }}">{{$archive->Unit->unit_name}}</option>
                    </select>
                </div>

                <!-- Kategori -->
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Kategori</label>
                    <select class="form-select form-input @error('category_name') is-invalid @enderror" name="category_id">
                        <option selected value="{{$archive->category_id}}">{{$archive->Category->category_name}}</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                        @endforeach
                    </select>
                    @error('category_name')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Deskripsi</label>
                    <textarea value="{{$archive->description}}" class="form-control form-input @error('description') is-invalid @enderror" rows="3" name="description">{{$archive->description}}</textarea>
                    @error('description')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Status -->
                @if($archive->completeness_status == 'Lengkap')
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Status</label>
                    <div class="form-check">
                        <input checked class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Lengkap" checked>
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
                @else
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Lengkap" checked>
                        <label class="form-check-label" for="gridRadios1">
                            Lengkap
                        </label>
                    </div>
                    <div class="form-check">
                        <input checked class="form-check-input" type="radio" name="gridRadios" id="Belum" value="Belum Lengkap">
                        <label class="form-check-label" for="gridRadios2">
                            Belum Lengkap
                        </label>
                    </div>
                </div>
                @endif
                <!-- Keterangan Belum Lengkap -->
                <div id="keterangan" class="col-md-12 mb-3 keterangan">
                    <label class="form-label">Keterangan</label>
                    <textarea open class="form-control" rows="3" id="keterangan" name="additional_info">{{$archive->additional_info}}</textarea>
                </div>
            </div>

            <div class="row col-6">
                <div class="upload-file col-md-12">
                    <label class="form-label">File</label>
                    <div class="existing-files">
                        @foreach ($files as $file)
                        <div class="alert alert-primary d-flex p-1 rounded-3">
                            <i class="fa fa-info-circle text-primary me-3 align-self-center"></i>
                            <div class="mb-0">{{$file->file_name}}</div>
                            <button type="button" style="margin-left:100px" data-bs-toggle="modal" data-bs-target="#exampleModal{{$file->id}}">
                                <i class="fa-solid fa-trash action-danger"></i>
                            </button>
                        </div>
                        <!-- Modal Alert -->
                        <div class="modal fade modal-sm" id="exampleModal{{$file->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-alert modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-close">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_bc4ugzhr.json" background="transparent" speed="1" style="width: 100px; height: 100px;" loop autoplay></lottie-player>
                                        <h6>Hapus File?</h6>
                                        <p>Anda yakin akan menghapus file {{$file->file_name}}?</p>
                                    </div>
                                    <div class="modal-button d-flex">
                                        <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal">Batal</button>
                                        <button type="button" data-id="{{ $file->id }}" data-bs-dismiss="modal" class="btn btn-danger btn-sm deleteRecord">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <label class="form-label">Tambahkan File</label>
                    <sub>(Max : 200MB)</sub>
                    <div class="mb-3">
                        <input type="file" name="file" id='file' class='p-5' multiple data-max-file-size="200MB">
                    </div>

                    <!-- <div class="form-container">
                            <input class="file-input" type="file" id="file" name="filex" hidden>
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Pilih File Untuk di Unggah</p>
                    </div>

                    <section class="progress-area">

                    </section>

                    <section class="uploaded-area">

                    </section> -->
                </div>
            </div>

            <div class="d-grid col-md-12">
                <button type="submit" class="btn btn-main">Update Arsip</button>
            </div>
        </form>
    </div>
</div>
@endsection
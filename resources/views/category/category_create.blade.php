@extends('layouts.app')
@section('content')
<div class="home-content">
    <div class="content-archiveCreate">
        <div class="content-header">
            <a href="/category" class="btn btn-main"><i class="fa-solid fa-angle-left"></i></a>
            <h5>Tambah Kategori</h5>
        </div>
        <form class="row" id="form" action="/category/category-create" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row col-6">

                <!-- Bidang -->
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Bidang</label>
                    <select class="form-select form-input @error('unit_id') is-invalid @enderror" name="unit_id">
                        <option selected hidden value="pilih" >Pilih Bidang...</option>
                        @foreach ($unit as $item)
                            <option value="{{ $item->id }}" @selected(old('unit_id') == $item->id)>{{ $item->unit_name }}</option>
                        @endforeach
                    </select>
                    @error('unit_id')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Nama Kategori -->
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Nama Kategori</label>
                    <input type="text" value="{{ old('category_name') }}" class="form-control form-input @error('category_name') is-invalid @enderror" name="category_name">
                    @error('category_name')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>
            <div class="row">
                <div class="d-grid col-md-6">
                    <button type="submit" class="btn btn-main">Tambah Kategori</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
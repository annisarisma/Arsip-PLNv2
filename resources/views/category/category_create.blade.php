@extends('layouts.app')
@section('content')
<div class="home-content">
    <div class="content-archiveCreate">
        <div class="content-header">
            <a href="/category" class="btn btn-main"><i class="fa-solid fa-angle-left"></i></a>
            <h5>Tambah Kategori</h5>
        </div>
        <form class="row" action="/category/category-create" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row col-6">

                <!-- Bidang -->
                <div class="col-md-12 mb-3">
                    <label class="form-label">Bidang</label>
                    <select class="form-select" name="unit_id">
                        <option selected hidden>Pilih Bidang...</option>
                        @foreach ($unit as $item)
                            <option value="{{ $item->id }}">{{ $item->unit_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Nama Kategori -->
                <div class="col-md-12 mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="category_name" class="form-control">
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
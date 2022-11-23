@extends('layouts.app')
@section('content')
<div class="home-content">
    <div class="content-archiveCreate">
        <div class="content-header">
            <a href="/category" class="btn btn-main"><i class="fa-solid fa-angle-left"></i></a>
            <h5>Edit Kategori</h5>
        </div>
        <form class="row" action="/category/category-edit/{{$category->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row col-6">

                <!-- Bidang -->
                <div class="col-md-12 mb-3">
                    <label class="form-label">Bidang</label>
                    <select class="form-select"  name="unit_id">
                        <option></option>
                        <option selected value="{{ $category->unit_id }}">{{ $category->Unit->unit_name }}</option>
                        @foreach ($unit as $item)
                            @if ($item->id == $category->unit_id)
                            <option hidden value="{{ $item->id }}">{{ $item->unit_name }}</option>
                            @elseif($item->_id != $category->unit_id)
                            <option value="{{ $item->id }}">{{ $item->unit_name }}</option>
                            @endif()
                        @endforeach
                    </select>
                </div>

                <!-- Nama Kategori -->
                <div class="col-md-12 mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input value="{{$category->category_name}}" type="text" name="category_name" class="form-control">
                </div>

            </div>
            <div class="row">
                <div class="d-grid col-md-6">
                    <button type="submit" class="btn btn-main">Update Kategori</button>
                </div> 
            </div>           
        </form>
    </div>
</div>
@endsection
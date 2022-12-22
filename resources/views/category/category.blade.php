@extends('layouts.app')
@section('content')
<div class="home-content">
    <div class="content-archive">
        <div class="content-header">
            <h4>Kelola Kategori
                <h6><span class="badge rounded-pill">
                    {{$chip}}
                </span><h6>
            </h4>
            <!-- <div class="split"></div>
                        <h4>Semua Arsip</h4> -->
        </div>

        <div class="content-row row">

            <a class="btn btn-create col-2" href="/category/category-create"><i class="fa-solid fa-layer-group icon"></i>Tambah Kategori</a>

            <button id="buttonExport" class="btn btn-primary col-2"><i class="fa-solid fa-file-export"></i>Export ke Excel</button>

            <div class="btn-group col-2">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-filter"></i>
                    Filter Bidang
                </button>
                <ul class="dropdown-menu dropdown-menu-start">
                    <li><a class="dropdown-item" href="/category/">Semua Bidang</a></li>
                    <li><a class="dropdown-item" href="/category/adm-keuangan">ADM & KEUANGAN</a></li>
                    <li><a class="dropdown-item" href="/category/perizinan-pertanahan">PERIZINAN & PERTANAHAN</a></li>
                    <li><a class="dropdown-item" href="/category/k3l">K3L</a></li>
                    <li><a class="dropdown-item" href="/category/teknik">TEKNIK</a></li>
                </ul>
            </div>

        </div>

        <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA BIDANG</th>
                    <th>NAMA KATEGORI</th>
                    <th class="noExl">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($category as $item)
                    <tr>
                        <td style="width: 2%;">{{ $i }}</td>
                        <td style="width: 12%;">{{$item->Unit->unit_name}}</td>
                        <td style="width: 18%;">{{$item->category_name}}</td>
                        <td style="width: 2%;">
                            <button>
                                <a href="/category/category-edit/{{ $item->id }}">
                                    <i class="fa-solid fa-pen-to-square action-edit"></i>
                                </a>
                            </button>
                            <button data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">
                                <i class="fa-solid fa-trash action-danger"></i>
                            </button>
                        </td>
                        @php
                            $i = $i + 1;
                        @endphp
                    </tr>
                    <!-- Modal Alert -->
                    <div class="modal fade modal-sm" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-alert modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-close">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_bc4ugzhr.json"  background="transparent"  speed="1"  style="width: 100px; height: 100px;"  loop autoplay></lottie-player>
                                    <h6>Hapus Kategori</h6>
                                    <p>Anda yakin akan menghapus kategori {{$item->category_name}}?</p>
                                </div>
                                <div class="modal-button d-flex">
                                    <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal">Batal</button>
                                    <form action="/category/category-delete/{{ $item->id }}" method="POST" class="d-inline">
                                    @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
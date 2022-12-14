@extends('layouts.app')
@section('content')
<div class="home-content">
    <div class="content-archive">
    @include('layouts.flash-message')
        <div class="content-header">
            <h4>Arsip
                <h6><span class="badge rounded-pill">
                    {{$title}}
                </span><h6>
            </h4>
        </div>

        <div class="content-row row">

            <button id="buttonExport" class="btn btn-primary col-2"><i class="fa-solid fa-file-export"></i>Export to Excel</button>

            <div class="btn-group col-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFilter">
                    <i class="fa-solid fa-filter"></i>
                    Filter Arsip
                </button>
            </div>
            @if(str_contains(url()->current(), '/filter-all'))
            <div class="btn-group col-2">
                <a href="archive/semua" class="btn btn-secondary"><i class="fa-solid fa-rotate-left"></i>Reset Filter</a>
            </div>
            @endif

            <!-- Modal Filter -->
            <div class="modal fade modal-md" id="modalFilter" tabindex="-1" aria-labelledby="modalKeterangan" aria-hidden="true">
                <div class="modal-dialog modal-keterangan modal-dialog-centered">
                    <div class="modal-content">
                    <form action="/filter-all" method="GET">
                        <div class="modal-header">
                            <h1>Filter Arsip</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Urutkan</p>
                                <div class="chip-group" tabindex="-1">
                                    <div class="chip chip-checkbox" tabindex="0" >
                                        <input type="radio" id="sort" value="desc" name="sort" checked />
                                        <span>Terbaru</span>
                                    </div>
                                    <div class="chip chip-checkbox" tabindex="0" >
                                        <input type="radio" id="sort" value="asc" name="sort" />
                                        <span >Terlama</span>
                                    </div>
                                </div>
                            <br>
                            <p>Bidang</p>
                                <div class="chip-group" tabindex="-1">
                                    <div class="chip chip-checkbox"  tabindex="0" >
                                        <input type="radio" id="unit" value="1" name="unit" />
                                        <span >ADM & KEUANGAN</span>
                                    </div>
                                    <div class="chip chip-checkbox"  tabindex="0"  >
                                        <input type="radio" id="unit" value="2" name="unit" />
                                        <span >PERIZINAN PERTANAHAN</span>
                                    </div>
                                    <div class="chip chip-checkbox" tabindex="0" >
                                        <input type="radio" id="unit" value="3"name="unit" />
                                        <span >K3L</span>
                                    </div>
                                    <div class="chip chip-checkbox"  tabindex="0" >
                                        <input type="radio" id="unit" value="4" name="unit" />
                                        <span>TEKNIK</span>
                                    </div>
                                </div>
                            <br>
                            <p>Status</p>
                                <div class="chip-group" tabindex="-1">
                                    <div class="chip chip-checkbox"  tabindex="0">
                                        <input type="radio" id="status" value="Lengkap" name="status" />
                                        <span >Lengkap</span>
                                    </div>
                                    <div class="chip chip-checkbox"tabindex="0" >
                                        <input type="radio" id="status" value="Belum Lengkap" name="status" />
                                        <span >Belum Lengkap</span>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" style='background-color:#1c5b68; color:white'class="btn btn-primary">Terapkan Filter</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

        </div>
        <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>DETAIL</th>
                    <th>NO</th>
                    <th>NAMA BIDANG</th>
                    <th>KATEGORI</th>
                    <th>NAMA ARSIP</th>
                    <th>DESKRIPSI</th>
                    <th>LAMPIRAN</th>
                    <th>USERNAME</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($archive as $item)
                <tr>
                    <td class="collapsible">
                        <button>
                            <i class="fa-solid fa-caret-down action-more"></i>
                        </button>
                    </td>
                    <td class="no">{{ $i }}</td>
                    <td class="nama_bidang">{{$item->Unit->unit_name}}</td>
                    <td class="kategori hidden-wrap">{{$item->Category->category_name}}</td>
                    <td class="nama_proyek hidden-wrap">{{$item->archive_name}}</td>
                    <td class="deskripsi hidden-wrap"
                        data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip"
                        data-bs-title={{$item->description}}>
                        {{$item->description}}
                    </td>
                    <td class="file"><i class="fa-solid fa-file"></i>{{$item->Files->count()}}</td>
                    <td class="username">{{$item->User->username}}</td>
                    <td class="status">
                        @if ($item->completeness_status == "Lengkap")
                        <i class="fa-solid fa-check status-success"></i>{{$item->completeness_status}}</td>
                        @else
                        <i class="fa-solid fa-hourglass-half status-warning"></i>{{$item->completeness_status}}</td>
                        @endif
                    <td class="aksi">
                        <button>
                            <i class="fa-solid fa-print action-warning"></i>
                        <button>
                        @if ($item->completeness_status == "Belum Lengkap")
                        <button data-bs-toggle="modal" data-bs-target="#modalKeterangan{{$item->id}}">
                            <i class="fa-solid fa-circle-info action-primary"></i>
                        </button>
                        @endif
                    </td>
                </tr>
                {{-- Expand File --}}
                <tr class="expand" id="expand">
                    <td class="row-expand" colspan="10">
                        <p>{{$item->Files->count()}} File Diunggah: </p>
                        @foreach($item->Files as $file)
                        <div class="container-expand">
                            <div class="content-expand">
                                <i class="fa-solid fa-file"></i>
                                <span>{{$file->file_name}}</span>
                            </div>
                            <div class="button">
                                <i class="fa-solid fa-eye action-warning"></i>
                                <i class="fa-solid fa-print action-warning"></i>
                            </div>
                        </div>
                        @endforeach
                        <em>Dibuat Pada: {{$item->created_at}} // Terakhir Diubah Pada: {{$item->updated_at}} </em>
                    </td>
                </tr>

                <!-- Modal Keterangan -->
                <div class="modal fade modal-md" id="modalKeterangan{{$item->id}}" tabindex="-1" aria-labelledby="modalKeterangan" aria-hidden="true">
                    <div class="modal-dialog modal-keterangan modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1>Keterangan Arsip</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{$item->additional_info}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $i = $i + 1;
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
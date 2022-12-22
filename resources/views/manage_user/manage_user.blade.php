@extends('layouts.app')
@section('content')
    <div class="home-content">
        <div class="content-archive">
            @include('layouts.flash-message')

            <div class="content-header">
                <h4>Kelola Pengguna</h4>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#approved_user" role="tab" aria-controls="home" aria-selected="true">Kelola Akun Pengguna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#delete_request" role="tab" aria-controls="profile" aria-selected="false">Kelola Hapus Arsip</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">


                {{-- Approved User --}}
                <div class="tab-pane fade show active" id="approved_user" role="tabpanel" aria-labelledby="dashboard-tab">
                    <form action="/accept-user/selected" method="POST">
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
                                                            <span >Menunggu</span>
                                                        </div>
                                                        <div class="chip chip-checkbox"  tabindex="0">
                                                            <input type="radio" id="status" value="Lengkap" name="status" />
                                                            <span >Disetujui</span>
                                                        </div>
                                                        <div class="chip chip-checkbox"tabindex="0" >
                                                            <input type="radio" id="status" value="Belum Lengkap" name="status" />
                                                            <span >Ditolak</span>
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
                                    <th><input type="checkbox" id="select_all"></th>
                                    <th>NO</th>
                                    <th>USERNAME</th>
                                    <th>BIDANG</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp

                                @foreach ($datas as $data)
                                    <tr>
                                        <td><input type="checkbox" class="select" name="select[{{ $i }}]" value="{{ $data->id }}"></td>
                                        <td style="width: 2%;">{{ $no++ }}</td>
                                        <td style="width: 50%;">{{ $data->username }}</td>
                                        <td style="width: 18%;">{{ $data->unit->unit_name }}</td>
                                        <td style="width: 15%;">
                                            @if ($data->status == 'Disetujui')
                                                <i class="fa-solid fa-check status-success"></i>Disetujui
                                            @elseif ($data->status == 'Menunggu')
                                                <i class="fa-solid fa-hourglass-half status-warning"></i>Menunggu
                                            @elseif ($data->status == 'Ditolak')
                                                <i class="fa-solid fa-trash status-danger"></i>Ditolak
                                            @endif
                                        </td>
            
                                        <td style="width: 15%;">
                                            @if ($data->status == 'Disetujui' && $data->username != 'administrator')
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#modal-remove-{{ $data->username }}">
                                                    <i class="fa-solid fa-trash action-danger"></i>
                                                </button>
                                            @elseif ($data->status == 'Menunggu')
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#modal-reject-{{ $data->username }}">
                                                    <i class="fa-solid fa-ban action-danger"></i>
                                                </button>
                                                <button type="button" class="" data-bs-toggle="modal"
                                                    data-bs-target="#modal-accept-{{ $data->username }}">
                                                    <i class="fa-solid fa-check action-success"></i>
                                                </button>
                                            @elseif ($data->status == 'Ditolak')
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#modal-remove-{{ $data->username }}">
                                                    <i class="fa-solid fa-trash action-danger"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
            
                                    <!-- Modal Hapus Data -->
                                    <div class="modal fade modal-sm" id="modal-remove-{{ $data->username }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-alert modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-close">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_snggjsji.json"
                                                        background="transparent" speed="1" style="width: 100px; height: 100px;"
                                                        loop autoplay>
                                                    </lottie-player>
                                                    <h6>Hapus User</h6>
                                                    <p>Anda yakin akan menghapus user {{ $data->username }}?</p>
                                                </div>
                                                <div class="modal-button">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="/delete-user/{{ $data->id }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm">Hapus User</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                    <!-- Modal Terima -->
                                    <div class="modal fade modal-sm" id="modal-accept-{{ $data->username }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-alert modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-close">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_bo8vqwyw.json"
                                                        background="transparent" speed="1" style="width: 100px; height: 100px;"
                                                        loop autoplay>
                                                    </lottie-player>
                                                    <h6>Terima Permintaan</h6>
                                                    <p>Anda yakin akan menyetujui {{ $data->username }}?</p>
                                                </div>
                                                <div class="modal-button">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="/accept-user/{{ $data->id }}" method="POST">
                                                        @csrf
                                                        <input type="text" name="status" value="Disetujui" hidden>
                                                        <input type="text" name="role" value="admin" hidden>
                                                        <button type="submit" class="btn btn-primary btn-sm">Terima User</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                    <!-- Modal Tolak User -->
                                    <div class="modal fade modal-sm" id="modal-reject-{{ $data->username }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-alert modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-close">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_bc4ugzhr.json"
                                                        background="transparent" speed="1" style="width: 100px; height: 100px;"
                                                        loop autoplay>
                                                    </lottie-player>
                                                    <h6>Tolak Permintaan</h6>
                                                    <p>Anda yakin akan menolak {{ $data->username }}?</p>
                                                </div>
                                                <div class="modal-button">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="/dennied-user/{{ $data->id }}" method="POST">
                                                        @csrf
                                                        <input type="text" name="status" value="Ditolak" hidden>
                                                        <button type="submit" class="btn btn-primary btn-sm">Tolak User</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @php
                                        $i += 1;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>

                {{-- Delete Request --}}
                <form action="/accept-request/selected" method="POST" class="tab-pane fade" id="delete_request" role="tabpanel" aria-labelledby="loginregist-tab">
                    @csrf
                    @method('delete')
                    <div>
                        <div class="content-row row">
                            
                            <button id="buttonExport" class="btn btn-primary col-2"><i class="fa-solid fa-file-export"></i>Export to Excel</button>
                            
                            <div class="btn-group col-2">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-filter"></i>
                                    Dropdown Filter
                                </button>
                                <ul class="dropdown-menu dropdown-menu-start">
                                    <li><a class="dropdown-item" href="#">Menu item</a></li>
                                    <li><a class="dropdown-item" href="#">Menu item</a></li>
                                    <li><a class="dropdown-item" href="#">Menu item</a></li>
                                </ul>
                            </div>
                            
                            <button id="buttonSelect" type="submit" class="btn btn-primary col-2">Terima Pengajuan Hapus</button>
                            
                        </div>

                        <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="select_all_delete"></th>
                                    <th>NO</th>
                                    <th>DETAIL</th>
                                    <th>NAMA ARSIP</th>
                                    <th>BIDANG</th>
                                    <th>DIAJUKAN OLEH</th>
                                    <th>TANGGAL PENGAJUAN</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
    
                                @foreach ($delete_requests as $item)
                                    <tr>
                                        <td><input type="checkbox" class="select_delete" name="checkbox[{{ $i }}]" value="{{ $item->archive->id }}"></td>
                                        <td style="width: 2%;">{{ $n_deleteRequest++ }}</td>
                                        <td class="collapsible" style="width: 3%;">
                                            <button>
                                                <i class="fa-solid fa-caret-down action-more"></i>
                                            </button>
                                        </td>
                                        <td style="width: 49%;">{{ $item->archive->archive_name }}</td>
                                        <td style="width: 15%;">{{ $item->archive->unit->unit_name }}</td>
                                        <td style="width: 10%;">{{ $item->user->username }}</td>
                                        <td style="width: 15%;">{{ $item->created_at->translatedFormat('j F Y') }}</td>
                                        <td style="width: 6%;">
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#modal-reject-{{ $item->id }}">
                                                <i class="fa-solid fa-ban action-danger"></i>
                                            </button>
                                            <button type="button" class="" data-bs-toggle="modal"
                                                data-bs-target="#modal-accept-{{ $item->id }}">
                                                <i class="fa-solid fa-check action-success"></i>
                                            </button>
                                        </td>
                                    </tr>
    
                                    {{-- Expand File --}}
                                    <tr class="expand" id="expand">
                                        <td class="row-expand" colspan="9">
                                            
                                            <p>{{ $item->archive->files->count() }} <span>File Diunggah:</span></p>
                                            @foreach ($item->archive->files as $file)
                                            <div class="container-expand">
                                                <div class="content-expand">
                                                    <i class="fa-solid fa-file"></i>
                                                    <span>{{ $file->file_name }}</span>
                                                </div>
                                                <div class="button">
                                                    <i class="fa-solid fa-eye action-warning"></i>
                                                    <i class="fa-solid fa-print action-warning"></i>
                                                </div>
                                            </div>
                                            @endforeach
    
                                            <div class="row-table">
                                                <h6 class="text-title">Deskripsi</h6>
                                                <h6>:</h6>
                                                <div class="text-content">
                                                    {{ $item->archive->description }}
                                                </div>
                                            </div>
                                            @if (isset($item->archive->additional_info))
                                            <div class="row-table">
                                                <h6 class="text-title">Keterangan</h6>
                                                <h6>:</h6>
                                                <div class="text-content">
                                                    {{ $item->archive->additional_info }}
                                                </div>
                                            </div>
                                            @endif
                                            <div class="row-table">
                                                <h6 class="text-title">Status</h6>
                                                <h6>:</h6>
                                                <div class="text-content">
                                                    @if ($item->archive->completeness_status == "Lengkap")
                                                        <i class="fa-solid fa-check status-success"></i><span>{{$item->archive->completeness_status}}</span>
                                                    @else
                                                        <i class="fa-solid fa-hourglass-half status-warning"></i><span>{{$item->archive->completeness_status}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row-table">
                                                <h6 class="text-title">Alasan Hapus</h6>
                                                <h6>:</h6>
                                                <div class="text-content">
                                                    {{ $item->reason }}
                                                </div>
                                            </div>
                                            <div class="row-table">
                                                <h6 class="text-title">Diajukan Oleh</h6>
                                                <h6>:</h6>
                                                <div class="text-content">
                                                    {{ $item->user->username }}
                                                </div>
                                            </div>
                                            <p class="info-user">Arsip diunggah oleh <span class="user">{{ $item->archive->user->username }}</span></p>
                                        </td>
                                    </tr>
            
                                    <!-- Modal Terima -->
                                    <div class="modal fade modal-sm" id="modal-accept-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-alert modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-close">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_lsmgfcej.json"
                                                        background="transparent" speed="1" style="width: 200px; height: 200px;"
                                                        loop autoplay>
                                                    </lottie-player>
                                                    <h6>Terima Permintaan</h6>
                                                    <p>Anda yakin akan menyetujui pengajuan hapus arsip {{ $item->archive->archive_name }}?</p>
                                                </div>
                                                <div class="modal-button">
                                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                                    <form action="/accept-request/{{ $item->archive_id }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-primary btn-sm">Terima pengajuan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                    <!-- Modal Tolak Pengajuan -->
                                    <div class="modal fade modal-sm" id="modal-reject-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-alert modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-close">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_bc4ugzhr.json"
                                                        background="transparent" speed="1" style="width: 100px; height: 100px;"
                                                        loop autoplay>
                                                    </lottie-player>
                                                    <h6>Tolak Pengajuan</h6>
                                                    <p>Anda yakin akan menolak pengajuan hapus arsip {{ $item->archive->archive_name }}?</p>
                                                </div>
                                                <div class="modal-button">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="/delete-request/{{ $item->id }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-primary btn-sm">Tolak Pengajuan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @php
                                        $i += 1;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

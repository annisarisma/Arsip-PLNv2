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
                    <div class="content-row row">

                        <form role="search" class="col-5">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        </form>

                        <button id="buttonExport" class="btn btn-primary col-2"><i class="fa-solid fa-file-export"></i>Export to Excel</button>

                        <div class="btn-group col-2">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-filter"></i>
                                Dropdown Filter
                            </button>
                            <ul class="dropdown-menu dropdown-menu-start">
                                <li><a class="dropdown-item" href="#">Terbaru Diajukan</a></li>
                            </ul>
                        </div>

                    </div>

                    <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Detail</th>
                                <th>Username</th>
                                <th>Bidang</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td style="width: 2%;">{{ $no++ }}</td>
                                    <td class="collapsible">
                                        <button>
                                            <i class="fa-solid fa-caret-down action-more"></i>
                                        </button>
                                    </td>
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
                                        @if ($data->status == 'Disetujui')
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
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Delete Request --}}
                <div class="tab-pane fade" id="delete_request" role="tabpanel" aria-labelledby="loginregist-tab">
                    <div class="content-row row">

                        <form role="search" class="col-5">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        </form>

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

                    </div>

                    <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Detail</th>
                                <th>Nama Arsip</th>
                                <th>Bidang</th>
                                <th>Diajukan Oleh</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($delete_requests as $item)
                                <tr>
                                    <td style="width: 2%;">{{ $n_deleteRequest++ }}</td>
                                    <td class="collapsible" style="width: 3%;">
                                        <button>
                                            <i class="fa-solid fa-caret-down action-more"></i>
                                        </button>
                                    </td>
                                    <td style="width: 54%;">{{ $item->archive->archive_name }}</td>
                                    <td style="width: 15%;">{{ $item->archive->unit->unit_name }}</td>
                                    <td style="width: 10%;">{{ $item->user->username }}</td>
                                    <td style="width: 10%;">{{ $item->created_at->translatedFormat('j F Y') }}</td>
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

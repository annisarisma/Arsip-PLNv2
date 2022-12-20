@extends('layouts.app')
@section('content')
    <div class="home-content">
        <div class="content-archive">
        @include('layouts.flash-message')
            <div class="content-header">
                <h4>Arsip
                    <h6><span class="badge rounded-pill">
                            {{ strtoupper($title) }}
                        </span>
                        <h6>
                </h4>
            </div>
            <div class="content-row row">

                <form role="search" class="col-5">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </form>
                @if ($title == "ADM & Keuangan")
                <a class="btn btn-create col-2" href="/archive/archive-create/1"><i
                        class="fa-solid fa-layer-group icon"></i>Tambah Arsip</a>
                @elseif ($title == "Perizinan & Pertanahan")
                <a class="btn btn-create col-2" href="/archive/archive-create/2"><i
                        class="fa-solid fa-layer-group icon"></i>Tambah Arsip</a>
                @elseif ($title == "K3L")
                <a class="btn btn-create col-2" href="/archive/archive-create/3"><i
                        class="fa-solid fa-layer-group icon"></i>Tambah Arsip</a>
                @else
                <a class="btn btn-create col-2" href="/archive/archive-create/4"><i
                        class="fa-solid fa-layer-group icon"></i>Tambah Arsip</a>
                @endif

                <button id="buttonExport" class="btn btn-primary col-2"><i class="fa-solid fa-file-export"></i>Export to Excel</button>

                <div class="btn-group col-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFilter">
                        <i class="fa-solid fa-filter"></i>
                        Filter Arsip
                    </button>
                </div>
                @if(str_contains(url()->current(), '/filter-unit'))
                <div class="btn-group col-2">
                    @if ($title == "ADM & Keuangan")
                    <a href="/archive/adm-keuangan/" class="btn btn-secondary"><i class="fa-solid fa-rotate-left"></i>Reset Filter</a>
                    @elseif ($title == "Perizinan & Pertanahan")
                    <a href="/archive/perizinan-pertanahan/" class="btn btn-secondary"><i class="fa-solid fa-rotate-left"></i>Reset Filter</a>
                    @elseif ($title == "K3L")
                    <a href="/archive/k3l/" class="btn btn-secondary"><i class="fa-solid fa-rotate-left"></i>Reset Filter</a>
                    @else
                    <a href="/archive/teknik/" class="btn btn-secondary"><i class="fa-solid fa-rotate-left"></i>Reset Filter</a>
                    @endif
                </div>
                @endif
                <!-- Modal Keterangan -->
                <div class="modal fade modal-md" id="modalFilter" tabindex="-1" aria-labelledby="modalKeterangan" aria-hidden="true">
                    <div class="modal-dialog modal-keterangan modal-dialog-centered">
                        <div class="modal-content">
                        @if ($title == "ADM & Keuangan")
                        <form action="/archive/adm-keuangan/filter-unit" method="GET">
                        @elseif ($title == "Perizinan & Pertanahan")
                        <form action="/archive/perizinan-pertanahan/filter-unit" method="GET">
                        @elseif ($title == "K3L")
                        <form action="/archive/k3l/filter-unit" method="GET">
                        @else
                        <form action="/archive/teknik/filter-unit" method="GET">
                        @endif
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
                                <p>Kategori</p>
                                    <div class="chip-group" tabindex="-1">
                                        @foreach ($category as $item)
                                        <div class="chip chip-checkbox"  tabindex="0" >
                                            <input type="radio" id="category" value="{{$item->id}}" name="category" />
                                            <span>{{$item->category_name}}</span>
                                        </div>
                                        @endforeach
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
                        <th>No</th>
                        <th>Detail</th>
                        <th>Nama Bidang</th>
                        <th>Nama Arsip</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>File</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($archive as $item)
                    <tr>
                        <td class="no">{{ $i }}</td>
                        <td class="collapsible">
                            <button>
                                <i class="fa-solid fa-caret-down action-more"></i>
                            </button>
                        </td>
                        <td class="nama_bidang">{{$item->Unit->unit_name}}</td>
                        <td class="kategori hidden-wrap">{{$item->archive_name}}</td>
                        <td class="nama_proyek hidden-wrap">{{$item->Category->category_name}}</td>
                        <td class="deskripsi hidden-wrap" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-custom-class="custom-tooltip" data-bs-title={{$item->description}}>
                            {{$item->description}}
                        </td>
                        <td class="file"><i class="fa-solid fa-file"></i>{{$item->Files->count()}}</td>
                        <td class="username">{{$item->User->username}}</td>
                        @if ($item->completeness_status == "Lengkap")
                        <td class="status">
                            <i class="fa-solid fa-check status-success"></i>{{$item->completeness_status}}
                        </td>
                        @else
                        <td class="status">
                            <i class="fa-solid fa-hourglass-half status-warning"></i>{{$item->completeness_status}}
                        </td>
                        @endif
                        <td class="aksi">
                            <button>
                                <a href="/archive/archive-edit/{{ $item->id }}/{{ $item->unit_id}}">
                                    <i class="fa-solid fa-pen-to-square action-edit"></i>
                                </a>
                            </button>
                            @if (auth()->user()->role == 'superadmin')
                            <button data-bs-toggle="modal" data-bs-target="#modal-remove-{{$item->id}}">
                                <i class="fa-solid fa-trash action-danger"></i>
                            </button>
                            @else
                            <button data-bs-toggle="modal" data-bs-target="#modal-request-remove-{{$item->id}}">
                                <i class="fa-solid fa-trash action-danger"></i>
                            </button>
                            @endif
                            @if ( $item->files->count() > 0 )
                            <a href="/archive/archive-download/{{ $item->id }}">
                                <i class="fa-regular fa-file-zipper action-warning"></i>
                            </a>
                            @endif
                            @if ($item->completeness_status == "Belum Lengkap")
                                <button data-bs-toggle="modal" data-bs-target="#modalKeterangan{{$item->id}}">
                                    <i class="fa-solid fa-circle-info action-primary"></i>
                                </button>
                            @endif
                        </td>
                        @php
                            $i = $i + 1;
                        @endphp
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
                                    <a href="/archive/archive-download-file/{{ $file->id }}" file target="_blank" style="color: #FFFF;">
                                        <i class="fa-solid fa-print action-warning"></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            <em>Dibuat Pada: {{$item->created_at}} // Terakhir Diubah Pada: {{$item->updated_at}} </em>
                        </td>
                    </tr>

                    <!-- Modal Alert Hapus -->
                    <div class="modal fade modal-sm" id="modal-remove-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-alert modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-close">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_bc4ugzhr.json" background="transparent" speed="1" style="width: 100px; height: 100px;" loop autoplay></lottie-player>
                                    <h6>Hapus Arsip</h6>
                                    <p>Anda yakin akan menghapus arsip {{$item->archive_name}}?</p>
                                </div>
                                <div class="modal-button d-flex">
                                    <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal">Batal</button>
                                    <form action="/archive/archive-delete/{{ $item->id }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Alert Pengajuan Hapus -->
                    <div class="modal fade modal-md" id="modal-request-remove-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-alert modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-close">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6>Mengajukan Hapus Arsip</h6>
                                    <p>Ajukan hapus arsip untuk menghapus arsip {{$item->archive_name}}?</p>
                                </div>
                                <div class="modal-request">
                                    <form id="myForm" action="/archive/archive-request-delete/" method="POST">
                                        @csrf
                                        <input type="text" hidden name="archive_id" value="{{ $item->id }}">
                                        <input type="text" hidden name="user_id" value="{{ auth()->user()->id }}">
                                        <div class="form-group col-md-12 mb-3">
                                            <label class="form-label required">Alasan Pengajuan Hapus Arsip</label>
                                            <textarea name="reason" id="reason" class="form-control form-input" rows="3" required></textarea>
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback"></div>
                                        </div>
                                        <div class="d-flex">
                                            <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger btn-sm">Pengajuan Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Keterangan -->
                    <div class="modal fade modal-md" id="modalKeterangan{{$item->id}}" tabindex="-1" aria-labelledby="modalKeterangan"
                        aria-hidden="true">
                        <div class="modal-dialog modal-keterangan modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1>Keterangan Arsip</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>{{$item->additional_info}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#myForm").submit(function() {
                var query = document.getElementById('reason');
            
                // Check if there is an entered value
                if(query.value == "") {
                    // Add errors highlight
                    $('#validationServerUsernameFeedback').html("Please enter your search query");
                    return false;
                }
                return true;
            })
        });
    </script>
@endsection

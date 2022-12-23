@extends('layouts.app')
@section('content')
<div class="home-content">
    <div class="content-archive">
        <div class="content-header-banner">
            <a href="javascript:history.go(-1)" class="btn btn-main"><i class="fa-solid fa-angle-left"></i></a>
            <h5>Ubah Tampilan Aplikasi</h5>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#dashboard" role="tab" aria-controls="home" aria-selected="true">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#loginregist" role="tab" aria-controls="profile" aria-selected="false">Daftar/Masuk</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <div class="content-row row">

                    <a class="btn btn-create btn-primary col-2" href="/user/manage-banner-create"><i class="fa-solid fa-layer-group icon"></i>Tambah Banner</a>

                    <button class="btn btn-primary col-2" data-bs-toggle="modal" data-bs-target="#ModalPratinjau"><i class="fa-solid fa-file-export"></i>Pratinjau Banner</button>

                </div>

                <table id="example1" class="example table table-striped table-bordered table-hover table-banner" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Banner</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($banner_1 as $item)
                        <tr>
                            <td class="no-banner">{{$i}}</td>
                            <td class="banner-name">{{$item->title}}</td>
                            @if($item->status == 'Tidak Aktif')
                            <td class="banner-status">
                                <label class="switch">
                                    <input class="status dashboard" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                                <span class="ms-1 text">Tidak Aktif</span> 
                            </td>
                            @else
                            <td class="banner-status">
                                <label class="switch">
                                    <input class="status dashboard" type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                                <span class="ms-1 text">Aktif</span> 
                            </td>
                            @endif
                            <td class="banner-action">
                                <button data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">
                                    <i class="fa-solid fa-image action-warning"></i>
                                </button>
                                <button>
                                <a href="/user/manage-banner-edit/{{ $item->id }}">
                                    <i class="fa-solid fa-pen-to-square action-edit"></i>
                                </a>
                                </button>
                                <button data-bs-toggle="modal" data-bs-target="#exampleModalAlert{{$item->id}}">
                                    <i class="fa-solid fa-trash action-danger"></i>
                                </button>
                            </td>
                        </tr>
                        @php
                            $i = $i + 1;
                        @endphp
                        <!-- Modal Lihat -->
                        <div class="modal fade modal-lg" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header d-block" style="border: none">
                                        <div class="d-flex">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat Banner</h1><br>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <h6 class="pl-2" style="color: grey;" id="exampleModalLabel">{{$item->title}}</h6>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{asset('Banner/'.$item->image)}}" width="100%">
                                    </div>
                                    <div class="modal-footer" style="border: none">
                                        <button type="button" class="btn mx-auto d-block" style="width:90%; background-color: #1c5b68;color:white" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Alert -->
                        <div class="modal fade modal-sm" id="exampleModalAlert{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-alert modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-close">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_bc4ugzhr.json"  background="transparent"  speed="1"  style="width: 100px; height: 100px;"  loop autoplay></lottie-player>
                                        <h6>Hapus Banner</h6>
                                        <p>Anda yakin akan menghapus banner {{$item->title}}?</p>
                                    </div>
                                    <div class="modal-button d-flex">
                                        <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal">Batal</button>
                                        <form action="/user/manage-banner-delete/{{ $item->id }}" method="POST" class="d-inline">
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
            <div class="tab-pane fade" id="loginregist" role="tabpanel" aria-labelledby="loginregist-tab">
                <div class="content-row row">

                    <a class="btn btn-create btn-primary col-2" href="/user/manage-banner-create"><i class="fa-solid fa-layer-group icon"></i>Tambah Banner</a>

                </div>

                <table id="example2" class="example table table-striped table-bordered table-hover table-banner" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Banner</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($banner_2 as $item)
                        <tr>
                            <td class="no-banner">{{$i}}</td>
                            <td class="banner-name">{{$item->title}}</td>
                            @if($item->status == "Aktif")
                            <td class="banner-status">
                                <input id="id_banner_aktif" value="{{$item->id}}" hidden>
                                <label class="switch">
                                    <input id="status_aktif" name="status_aktif" value="Aktif" class="status loginregist" type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                                <span class="ms-1 text">Aktif</span> 
                            </td>
                            @else
                            <td class="banner-status">
                                <input id="id_banner_tidak_aktif" value="{{$item->id}}" hidden>
                                <label class="switch">
                                    <input id="status_tidak_aktif" name="status_tidak_aktif" value="Tidak Aktif" class="status loginregist" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                                <span class="ms-1 text">Tidak Aktif</span> 
                            </td>
                            @endif
                            <td class="banner-action">
                                <button data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">
                                    <i class="fa-solid fa-image action-warning"></i>
                                </button>
                                <button>
                                <a href="/user/manage-banner-edit/{{ $item->id }}">
                                    <i class="fa-solid fa-pen-to-square action-edit"></i>
                                </a>
                                </button>
                                <button data-bs-toggle="modal" data-bs-target="#exampleModalAlert{{$item->id}}">
                                    <i class="fa-solid fa-trash action-danger"></i>
                                </button>
                            </td>
                        </tr>
                        @php
                            $i = $i + 1;
                        @endphp
                        <!-- Modal Lihat -->
                        <div class="modal fade modal-lg" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header d-block" style="border: none">
                                        <div class="d-flex">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat Banner</h1><br>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <h6 class="pl-2" style="color: grey;" id="exampleModalLabel">{{$item->title}}</h6>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{asset('Banner/'.$item->image)}}" width="100%">
                                    </div>
                                    <div class="modal-footer" style="border: none">
                                        <button type="button" class="btn mx-auto d-block" style="width:90%; background-color: #1c5b68;color:white" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Alert -->
                        <div class="modal fade modal-sm" id="exampleModalAlert{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-alert modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-close">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_bc4ugzhr.json"  background="transparent"  speed="1"  style="width: 100px; height: 100px;"  loop autoplay></lottie-player>
                                        <h6>Hapus Banner</h6>
                                        <p>Anda yakin akan menghapus banner {{$item->title}}?</p>
                                    </div>
                                    <div class="modal-button d-flex">
                                        <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal">Batal</button>
                                        <form action="/user/manage-banner-delete/{{ $item->id }}" method="POST" class="d-inline">
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
    </div>

    <!-- Modal Pratinjau -->
    <div class="modal fade modal-lg" id="ModalPratinjau" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-block" style="border: none">
                    <div class="d-flex">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Pratinjau Banner</h1><br>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <h6 class="pl-2" style="color: grey;" id="exampleModalLabel">Dashboard</h6>
                </div>
                <div class="modal-body">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                        <div class="carousel-indicators">
                            @php $i = 0; @endphp
                            @foreach($banner as $item)
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$i}}" class="{{$i =='0' ? 'active':''}}" aria-current="true" aria-label="Slide 1"></button>
                                @php $i++; @endphp
                            @endforeach
                            </div>
                        <div class="carousel-inner">
                                @php $i = 1; @endphp
                                @foreach($banner as $item)
                                <div class="carousel-item {{$i =='1' ? 'active':''}}">
                                    @php $i++; @endphp
                                    <img src="{{ asset('Banner/' . $item->image) }}" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                    <h5>{{$item->title}}</h5>
                                    <p>{{$item->description}}</p>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="modal-footer" style="border: none">
                    <button type="button" class="btn mx-auto d-block" style="width:90%; background-color: #1c5b68;color:white" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@extends('layouts.app')
@section('content')
    <div class="home-content">
        <div class="container-left-right">
            <div class="container-left">
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

                <div class="statistic-section">
                    <h4>Statistik</h4>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">

                                <div class="card-body">
                                    <div class="card-content">
                                        <h5 class="card-number">20</h5>
                                        <h5 class="card-title">Arsip Belum Lengkap</h5>
                                        <p class="card-text">Jumlah seluruh arsip dari bidang administrasi yang belum
                                            lengkap</p>
                                    </div>
                                    <div class="button">
                                        <a href="#" class="btn"><i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">

                                <div class="card-body">
                                    <div class="card-content">
                                        <h5 class="card-number">20</h5>
                                        <h5 class="card-title">Arsip Lengkap</h5>
                                        <p class="card-text">Jumlah seluruh arsip dari bidang administrasi yang belum
                                            lengkap</p>
                                    </div>
                                    <div class="button">
                                        <a href="#" class="btn"><i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">

                                <div class="card-body">
                                    <div class="card-content">
                                        <h5 class="card-number">20</h5>
                                        <h5 class="card-title">Arsip Lengkap</h5>
                                        <p class="card-text">Jumlah seluruh arsip dari bidang administrasi yang belum
                                            lengkap</p>
                                    </div>
                                    <div class="button">
                                        <a href="#" class="btn"><i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">

                                <div class="card-body">
                                    <div class="card-content">
                                        <h5 class="card-number">20</h5>
                                        <h5 class="card-title">Arsip Lengkap</h5>
                                        <p class="card-text">Jumlah seluruh arsip dari bidang administrasi yang belum
                                            lengkap</p>
                                    </div>
                                    <div class="button">
                                        <a href="#" class="btn"><i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="bidang-section">
                    <h4>Arsip Bidang</h4>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-icon">
                                        <i class="fa-solid fa-box-archive"></i>
                                    </div>
                                    <div class="content">
                                        <h5 class="card-title">ADM & Keuangan</h5>
                                        <p class="card-text">{{$archive_adm->count()}}</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-icon">
                                        <i class="fa-solid fa-box-archive"></i>
                                    </div>
                                    <div class="content">
                                        <h5 class="card-title">Perizinan & Pertanahan</h5>
                                        <p class="card-text">{{$archive_pp->count()}}</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-icon">
                                        <i class="fa-solid fa-box-archive"></i>
                                    </div>
                                    <div class="content">
                                        <h5 class="card-title">K3L</h5>
                                        <p class="card-text">{{$archive_k3l->count()}}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-icon">
                                        <i class="fa-solid fa-box-archive"></i>
                                    </div>
                                    <div class="content">
                                        <h5 class="card-title">Teknik</h5>
                                        <p class="card-text">{{$archive_teknik->count()}}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-right">
                <form role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </form>
                <div class="section-terbaru">
                    @foreach ($archive->take(5) as $item)
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="card-icon">
                                <i class="fa-solid fa-box-archive"></i>
                            </div>
                            <div class="content">
                                <h5 class="card-title">{{$item->archive_name}}</h5>
                                <p class="card-text">{{$item->Unit->unit_name}}</p>
                            </div>
                            <!-- <a class="card-arrow">
                                <i class="fa-solid fa-angle-right"></i>
                            </a> -->
                        </div>
                    </div>
                    @endforeach
                    <div class="d-grid gap-2 mt-4">
                        <button class="btn btn-sm" type="button"><a style="color:black; text-decoration:none" href="/archive/semua">Lihat semua arsip</a></button>
                    </div>
                </div>
            </div>

            {{-- Role User Unverified --}}
            @if (auth()->user()->role == 'unverified')
                <!-- Modal -->
                <div class="modal fade" id="onload" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <!-- Add this line to your code -->
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ARSIP PT PLN UPP JBT 1</h5>
                            </div>
                            <div class="modal-body">
                                <center>
                                    <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_6bblqgtq.json"
                                        background="transparent" speed="0.5" style="width: 200px; height: 200px;" loop
                                        autoplay></lottie-player>
                                    <center>
                                        <p style="text-align:center">Akun anda belum terverifikasi <br> Tunggu superadmin
                                            melakukan verifikasi agar anda dapat menggunakan fitur pengarsipan</p>
                            </div>
                            <div class="modal-footer">
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

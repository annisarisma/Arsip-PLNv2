@extends('layouts.app')
@section('content')
    <div class="home-content-user">
        <div class="content-user">
            <div class="user-left">
                <div class="content-header">
                    <h4>User</h4>
                </div>

                <div class="riwayat-delete">
                    <div class="riwayat-arsip">
                        <h5>Riwayat Arsip</h5>
                        <div class="container-arsip">
                            @foreach ($archives as $archive)
                                <div class="card-arsip">
                                    <div class="card-content">
                                        <i class="fa-solid fa-box-archive"></i>
                                        <div class="text">
                                            <h5 class="card-title">{{ $archive->archive_name }}</h5>
                                            <p class="card-text">{{ $archive->unit->unit_name }}</p>
                                        </div>
                                    </div>

                                    <a class="card-arrow">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <a href="">Lihat semua arsip</a>
                    </div>

                    <div class="riwayat-arsip">
                        @if ($user->role == 'superadmin')
                            <h5>Permintaan Hapus Arsip</h5>
                        @endif
                        @if ($user->role == 'admin')
                            <h5>Pengajuan Hapus Arsip</h5>
                        @endif
                        <div class="container-arsip">
                            <div class="card-arsip">
                                <div class="card-content">
                                    <i class="fa-solid fa-box-archive"></i>
                                    <div class="text">
                                        <h5 class="card-title">Permohonan Pembayaran Reimbuse</h5>
                                        <p class="card-text">ADM & Keuangan</p>
                                    </div>
                                </div>

                                <a class="card-arrow">
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </div>

                            <div class="card-arsip">
                                <div class="card-content">
                                    <i class="fa-solid fa-box-archive"></i>
                                    <div class="text">
                                        <h5 class="card-title">Permohonan Pembayaran Reimbuse</h5>
                                        <p class="card-text">ADM & Keuangan</p>
                                    </div>
                                </div>

                                <a class="card-arrow">
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </div>
                            <div class="card-arsip">
                                <div class="card-content">
                                    <i class="fa-solid fa-box-archive"></i>
                                    <div class="text">
                                        <h5 class="card-title">Permohonan Pembayaran Reimbuse</h5>
                                        <p class="card-text">ADM & Keuangan</p>
                                    </div>
                                </div>

                                <a class="card-arrow">
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </div>
                            <div class="card-arsip">
                                <div class="card-content">
                                    <i class="fa-solid fa-box-archive"></i>
                                    <div class="text">
                                        <h5 class="card-title">Permohonan Pembayaran Reimbuse</h5>
                                        <p class="card-text">ADM & Keuangan</p>
                                    </div>
                                </div>

                                <a class="card-arrow">
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </div>
                            <div class="card-arsip">
                                <div class="card-content">
                                    <i class="fa-solid fa-box-archive"></i>
                                    <div class="text">
                                        <h5 class="card-title">Permohonan Pembayaran Reimbuse</h5>
                                        <p class="card-text">ADM & Keuangan</p>
                                    </div>
                                </div>

                                <a class="card-arrow">
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </div>
                            <div class="card-arsip">
                                <div class="card-content">
                                    <i class="fa-solid fa-box-archive"></i>
                                    <div class="text">
                                        <h5 class="card-title">Permohonan Pembayaran Reimbuse</h5>
                                        <p class="card-text">ADM & Keuangan</p>
                                    </div>
                                </div>

                                <a class="card-arrow">
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </div>
                            <div class="card-arsip">
                                <div class="card-content">
                                    <i class="fa-solid fa-box-archive"></i>
                                    <div class="text">
                                        <h5 class="card-title">Permohonan Pembayaran Reimbuse</h5>
                                        <p class="card-text">ADM & Keuangan</p>
                                    </div>
                                </div>

                                <a class="card-arrow">
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </div>
                            <div class="card-arsip">
                                <div class="card-content">
                                    <i class="fa-solid fa-box-archive"></i>
                                    <div class="text">
                                        <h5 class="card-title">Permohonan Pembayaran Reimbuse</h5>
                                        <p class="card-text">ADM & Keuangan</p>
                                    </div>
                                </div>

                                <a class="card-arrow">
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                        <a href="">Lihat semua arsip</a>
                    </div>
                </div>

                <div class="carousel-button">
                    <div class="content">
                        <i class="fa-solid fa-gear"></i>
                        <div class="content-text">
                            <h5>Pengaturan</h5>
                            <p>Pengelola Aplikasi</p>
                        </div>
                    </div>
                    <a href="/user/manage-banner"><i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>

            <div class="user-right">
                <div class="content-profile">
                    <div class="image">
                        <img src="/Image/Ellipse 194.png" alt="">
                    </div>
                    <p class="username">{{ $user->username }}</p>
                    <div class="role">
                        <p>{{ $user->role }}</p>
                        <div class="status">
                            <i class="fa-solid fa-check"></i>
                            <p>{{ $user->status }}</p>
                        </div>
                    </div>
                </div>

                <div class="content-field">
                    <div class="field">
                        <label class="title-label">Nama</label>
                        <p>{{ $user->nama_depan . ' ' . $user->nama_belakang }}</p>
                    </div>
                    <div class="field">
                        <label class="title-label">Username</label>
                        <p>{{ $user->username }}</p>
                    </div>
                    <div class="field">
                        <label class="title-label">Email</label>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="field">
                        <label class="title-label">Bidang</label>
                        <p>{{ $user->unit->unit_name }}</p>
                    </div>
                    <div class="field">
                        <label class="title-label">Status</label>
                        <p>{{ $user->status }}</p>
                    </div>
                </div>

                <div class="d-grid col-md-12">
                    <a href="/user/edit-profile" type="submit" class="btn btn-main"><i class="fa-solid fa-pen-to-square"></i>Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
@endsection

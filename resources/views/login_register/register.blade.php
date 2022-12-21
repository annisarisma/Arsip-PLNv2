@extends('layouts.appLoginRegist')
@section('content')
    <div class="home-section-login">
        <div class="home-content-login">
            <div class="login-left">
                <div class="text">
                    <h4>Listrik Untuk Kehidupan Yang Lebih Baik</h4>
                    <p>Perusahaan Listrik Terkemuka se-Asia Tenggara dan #1 Pilihan Pelanggan untuk Solusi Energi.</p>
                </div>
                <div class="opacity"></div>
                <div class="image">
                    <img src="{{ asset('Banner/' . $banner->image) }}" alt="">
                </div>
            </div>
            <div class="login-right">
                <h4>Selamat Datang di Arsip PLN</h4>
                <p>Silahkan buat akun terlebih dahulu untuk login</p>
                <form action="/register/register-create" method="post">
                    @csrf
                    <div class="row">
                        <!-- Nama Depan -->
                        <div class="col-md-6 mb-3 field">
                            <label class="form-label">Nama Depan</label>
                            <input type="text" class="form-control form-input @error('nama_depan') is-invalid @enderror"
                                name="nama_depan" placeholder="Nama Depan" value="{{ old('nama_depan') }}">

                            @error('nama_depan')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Nama Belakang -->
                        <div class="col-md-6 mb-3 field">
                            <label class="form-label">Nama Belakang</label>
                            <input type="text" class="form-control form-input @error('nama_belakang') is-invalid @enderror"
                                name="nama_belakang" placeholder="Nama Belakang" value="{{ old('nama_belakang') }}">

                            @error('nama_belakang')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Username -->
                        <div class="col-md-6 mb-3 field">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control form-input @error('username') is-invalid @enderror"
                                name="username" placeholder="Username" value="{{ old('username') }}">

                            @error('username')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div class=" col-md-6 mb-3">
                            <label class="form-label">Bidang</label>
                            <select class="form-select form-input @error('unit_id') is-invalid @enderror" name="unit_id">
                                <option disabled selected style="display:none" value="">Pilih Bidang</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}"
                                        {{ old('unit_id') == $unit->id ? 'selected' : ' ' }}>
                                        {{ $unit->unit_name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('unit_id')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="col-md-12 mb-3 field">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control form-input @error('email') is-invalid @enderror"
                                name="email" placeholder="Email" value="{{ old('email') }}">

                            @error('email')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="col-md-12 mb-3 field">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control form-input @error('password') is-invalid @enderror"
                                name="password" placeholder="Password" value="{{ old('password') }}">

                            @error('password')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-md-12 mb-3 field">
                            <label class="form-label">Confirm Password</label>
                            <input type="password"
                                class="form-control form-input @error('confirm_password') is-invalid @enderror"
                                name="confirm_password" placeholder="Confirm password"
                                value="{{ old('confirm_password') }}">

                            @error('confirm_password')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>



                    </div>
                    <div class="button-container">
                        <button type="submit" class="btn btn-main">SignUp</button>
                        <p>Sudah punya akun? <span><a href="/login">Login</a></span></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

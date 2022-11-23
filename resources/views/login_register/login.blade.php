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
            <p>Silahkan login untuk masuk ke dalam web Arsip</p>
            <form action="/login/login-create" method="post">
                @csrf
                <div>
                    <!-- Username -->
                    <div class="col-md-12 mb-3 field">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control form-input @error('username') is-invalid @enderror" name="username" placeholder="Username" value="{{ old('username') }}">

                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="col-md-12 mb-3 field">.
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control form-input @error('password') is-invalid @enderror" name="password" placeholder="Password" value="{{ old('password') }}">

                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>



                </div>

                <div class="remember-forgot mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="remember">
                        <label class="form-check-label" for="flexCheckDefault">
                            Remember Me
                        </label>
                    </div>
                    <div class="forgot-pass">
                        <a href="">Forgot Password</a>
                    </div>
                </div>
                <div class="button-container">
                    <button type="submit" class="btn btn-main">Login</button>
                    <a href="/register" type="submit" class="btn btn-light shadow">SignUp</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
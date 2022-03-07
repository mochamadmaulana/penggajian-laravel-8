@extends('layout.main-auth', ['title' => 'Login'])

@section('content')
<div class="card">
    <div class="card-body register-card-body">
        <p class="login-box-msg">Login untuk masuk aplikasi</p>
        <form action="{{ route('login') }}" method="post">

            @csrf
            <div class="input-group mb-3">
                <input type="text" name="inputan" class="form-control @error('inputan') is-invalid @enderror"
                    value="{{ old('inputan') }}" placeholder="NIK/Email" autofocus autocomplete="off">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('inputan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row">
                <div class="col-lg">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-lg text-center mt-2">
                <span>Lupa password?<a href="#"> reset</a></sp>
            </div>
        </div>
        <div class="row">
            <div class="col-lg text-center">
                <span>Belum verifikasi email?<a href="{{ route('request.code') }}"> request</a></span>
            </div>
        </div>

    </div>
</div>

@endsection

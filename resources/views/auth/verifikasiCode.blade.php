@extends('layout.main-auth', ['title' => 'Verifikasi Email'])

@section('content')
@if (session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif
<div class="card">
    <div class="card-body register-card-body">
        <p class="login-box-msg">Masukan code verifikasi</p>
        <form action="{{ route('verifikasi') }}" method="post">

            @csrf
            <div class="input-group mb-3">
                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                    value="{{ old('code') }}" placeholder="Code" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-key"></span>
                    </div>
                </div>
                @error('code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row">
                <div class="col-lg">
                    <button type="submit" class="btn btn-primary btn-block">Verifikasi</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-lg text-center mt-2">
                <span>Sudah verifikasi?<a href="{{ route('login') }}"> login</a></span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg text-center">
                <span>Belum verifikasi email?<a href="{{ route('request.code') }}"> request</a></span>
            </div>
        </div>

    </div>
    <!-- /.form-box -->
</div><!-- /.card -->

@endsection

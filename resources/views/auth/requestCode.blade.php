@extends('layout.main-auth', ['title' => 'Request Code'])

@section('content')
@if (session('error'))
    <div class="alert alert-danger text-center">
        {{ session('error') }}
    </div>
@endif
<div class="card">
    <div class="card-body register-card-body">
        <p class="login-box-msg">Masukan Email untuk request code</p>
        <form action="{{ route('request.code') }}" method="post">

            @csrf
            <div class="input-group mb-3">
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" placeholder="Email" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row">
                <div class="col-lg">
                    <button type="submit" class="btn btn-primary btn-block">Request</button>
                </div>
            </div>
        </form>
        <p class="text-center mt-4">Sudah punya code?<a href="{{ route('verifikasi') }}"> verifikasi</a></p>

    </div>
    <!-- /.form-box -->
</div><!-- /.card -->

@endsection

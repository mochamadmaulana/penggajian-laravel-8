@extends('layout.main-auth', ['title' => 'Registrasi'])

@section('content')
<div class="card">
    <div class="card-body register-card-body">
        <p class="login-box-msg">Registrasi akun baru</p>

        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                    value="{{ old('nik') }}" placeholder="NIK" autofocus>
                @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                    value="{{ old('username') }}" placeholder="Username" autofocus>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror"
                    value="{{ old('nama_lengkap') }}" placeholder="Nama Lengkap" autofocus>
                @error('nama_lengkap')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    value="{{ old('password') }}" placeholder="Password" autofocus>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <select name="role" class="form-control @error('role') is-invalid @enderror">
                    <option value="">- Role -</option>
                    <option value="karyawan">Karyawan</option>
                    <option value="manager">Manager</option>
                    <option value="accounting">Accounting</option>
                    <option value="administrator">Administrator</option>
                </select>
                @error('role')
                <div class=" invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <select name="jabatan_id" class="form-control @error('jabatan_id') is-invalid @enderror">
                    <option value="">- Jabatan -</option>
                    @foreach ($jabatans as $jabatan)
                    <option value="{{$jabatan->id}}">{{$jabatan->jabatan}}</option>
                    @endforeach
                </select>
                @error('jabatan_id')
                <div class=" invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <select name="cabang_id" class="form-control @error('cabang_id') is-invalid @enderror">
                    <option value="">- Cabang -</option>
                    @foreach ($cabangs as $cabang)
                    <option value="{{$cabang->id}}">{{$cabang->cabang}}</option>
                    @endforeach
                </select>
                @error('cabang_id')
                <div class=" invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <select name="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="">- Status -</option>
                    <option value="Karyawan Tetap">Karyawan Tetap</option>
                    <option value="Karyawan Kontrak">Karyawan Kontrak</option>
                </select>
                @error('status')
                <div class=" invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row">
                <div class="col-lg">
                    <button type="submit" class="btn btn-primary btn-block">Registrasi</button>
                </div>
            </div>
        </form>
        <p class="text-center mt-4">Sudah punya akun?<a href="{{route('login')}}"> Login</a></p>

    </div>
    <!-- /.form-box -->
</div><!-- /.card -->
@endsection

@extends('layout.main-admin', ['title' => 'Data Users', 'titlecontent' => 'Tambah User'])

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('users.index') }}" class="btn btn-sm btn-danger float-right">
            <i class="fas fa-undo"></i> Kembali
        </a>
    </div>

    <div class="card-body">
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label>NIK</label> <small class="text-warning"> !Jika role karyawan harap isi NIK</small>
                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                            value="{{ old('nik') }}">
                        @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Role</label> <small class="text-danger">*</small>
                        <select name="role" class="form-control @error('role') is-invalid @enderror">
                            <option value="" class="text-danger">- Pilih Role -</option>
                            <option value="karyawan">Karyawan</option>
                            <option value="manager">Manager</option>
                            <option value="accounting">Accounting</option>
                            <option value="administrator">Admin</option>
                        </select>
                        @error('role')
                        <div class=" invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label>Nama Lengkap</label> <small class="text-danger">*</small>
                        <input type="text" name="nama_lengkap"
                            class="form-control @error('nama_lengkap') is-invalid @enderror"
                            value="{{ old('nama_lengkap') }}">
                        @error('nama_lengkap')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Jabatan</label> <small class="text-danger">*</small>
                        <select name="jabatan_id" class="form-control @error('jabatan_id') is-invalid @enderror">
                            <option value="" class="text-danger" aria-readonly="on">- Pilih Jabatan -</option>
                            @foreach ($jabatans as $jabatan)
                            <option value="{{$jabatan->id}}">{{Str::ucfirst($jabatan->jabatan)}}</option>
                            @endforeach
                        </select>
                        @error('jabatan_id')
                        <div class=" invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label>Email</label> <small class="text-danger">*</small>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}">
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Status</label> <small class="text-danger">*</small>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="" class="text-danger" aria-readonly="on">- Pilih Status -</option>
                            <option value="Karyawan Tetap">Karyawan Tetap</option>
                            <option value="Karyawan Kontrak">Karyawan Kontrak</option>
                        </select>
                        @error('status')
                        <div class=" invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label>Password</label> <small class="text-danger">*</small>
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Cabang</label> <small class="text-danger">*</small>
                        <select name="cabang_id" class="form-control @error('cabang_id') is-invalid @enderror">
                            <option value="" class="text-danger" aria-readonly="on">- Pilih Cabang -</option>
                            @foreach ($cabangs as $cabang)
                            @if(Auth::user()->cabang_id == $cabang->id)
                            <option value="{{$cabang->id}}" selected>{{$cabang->cabang}}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('cabang_id')
                        <div class=" invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
            <button type="reset" class="btn btn-sm btn-secondary"><i class="fas fa-trash"></i> Reset</button>
        </form>
    </div>

</div>
@endsection

@extends('layout.main-admin', ['title' => 'Data Users', 'titlecontent' => 'Edit User'])

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('users.index') }}" class="btn btn-sm btn-danger float-right">
            <i class="fas fa-undo"></i> Kembali
        </a>
    </div>

    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="post">
            @method('put')
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label>NIK</label> <small class="text-danger">*</small>
                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                            value="{{ $user->nik }}">
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
                            <option value="karyawan" {{$user->role === 'karyawan' ? 'selected' : ''}}>Karyawan</option>
                            <option value="manager" {{$user->role === 'manager' ? 'selected' : ''}}>Manager</option>
                            <option value="accounting" {{$user->role === 'accounting' ? 'selected' : ''}}>Accounting
                            </option>
                            <option value="administrator" {{$user->role === 'administrator' ? 'selected' :
                                ''}}>Administrator
                            </option>
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
                            value="{{ $user->nama_lengkap }}">
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
                            @foreach ($jabatans as $jabatan)
                            <option value="{{$jabatan->id}}" {{$user->jabatan_id === $jabatan->id ? 'selected' :
                                ''}}>{{Str::ucfirst($jabatan->jabatan)}}</option>
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
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ $user->email }}">
                        @error('email')
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
                            <option value="Karyawan Tetap" {{$user->status === 'Karyawan Tetap' ? 'selected' :
                                ''}}>Karyawan
                                Tetap</option>
                            <option value="Karyawan Kontrak" {{$user->status === 'Karyawan Kontrak' ? 'selected' :
                                ''}}>Karyawan
                                Kontrak</option>
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
                        <label>Password </label> <small class="text-warning">! Biarkan kosong jika tidak ingin merubah password</small>
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror">
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
                            @foreach ($cabangs as $cabang)
                            <option value="{{$cabang->id}}" {{$user->cabang_id === $cabang->id ? 'selected' :
                                ''}}>{{$cabang->cabang}}</option>
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
            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Edit</button>
        </form>
    </div>
</div>
@endsection

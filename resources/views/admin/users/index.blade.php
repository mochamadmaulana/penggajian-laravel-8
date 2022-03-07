@extends('layout.main-admin', ['title' => 'Data Users'])

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Tambah User
        </a>
        {{-- <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalAdduser">
            <i class="fas fa-plus"></i> Data User
        </button> --}}
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Cabang</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($users as $user): ?>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{$user->nik}}</td>
                        <td>{{$user->nama_lengkap}}</td>
                        <td>{{ Str::ucfirst($user->jabatan->jabatan) }}</td>
                        <td>{{$user->status}}</td>
                        <td>{{$user->cabang->cabang}}</td>
                        <td>
                            @if(Auth::user()->cabang_id === $user->cabang_id)
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm text-success mr-2">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <form action="{{route('users.destroy', $user->id)}}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm text-danger border-0">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->


{{-- Modal Add User --}}
{{-- <div class="modal fade" id="modalAdduser">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i>
                    Batal</button>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div> --}}
{{-- End Modal Add User --}}


{{-- Modal Edit User --}}
@foreach ($users as $user)
<div class="modal fade" id="modalEdituser{{ Str::ucfirst($user->username) }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit {{$user->nama_lengkap}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.update', $user->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label>NIK</label> <small class="text-warning"> !Jika role karyawan harap isi NIK</small>
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
                                    <option value="accounting" {{$user->role === 'accounting' ? 'selected' : ''}}>Accounting</option>
                                    <option value="administrator" {{$user->role === 'administrator' ? 'selected' : ''}}>Administrator</option>
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
                                    <option value="{{$jabatan->id}}" {{$user->jabatan_id === $jabatan->id ? 'selected' : ''}}>{{Str::ucfirst($jabatan->jabatan)}}</option>
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
                                    <option value="Karyawan Tetap" {{$user->status === 'Karyawan Tetap' ? 'selected' : ''}}>Karyawan Tetap</option>
                                    <option value="Karyawan Kontrak" {{$user->status === 'Karyawan Kontrak' ? 'selected' : ''}}>Karyawan Kontrak</option>
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
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Cabang</label> <small class="text-danger">*</small>
                                <select name="cabang_id" class="form-control @error('cabang_id') is-invalid @enderror">
                                    @foreach ($cabangs as $cabang)
                                    <option value="{{$cabang->id}}" {{$user->cabang_id === $cabang->id ? 'selected' : ''}}>{{$cabang->cabang}}</option>
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
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i>
                    Batal</button>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Edit</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach
{{-- End Modal Edit User --}}

{{-- Modal Edit Password User --}}
@foreach ($users as $user)
<div class="modal fade" id="modalEditPassworduser{{ Str::ucfirst($user->username) }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Password {{$user->nama_lengkap}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('changePassword', $user->id) }}" method="post">
                    @csrf
                    @method('put')
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
                    <div class="form-group mb-3">
                        <label>Konfirmasi Password</label> <small class="text-danger">*</small>
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}">
                        @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i>
                    Batal</button>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Edit</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach
{{-- End Modal Edit Password User --}}


@endsection

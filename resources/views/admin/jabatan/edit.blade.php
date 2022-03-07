@extends('layout.main-admin', ['title' => 'Data Jabatan', 'titlecontent' => 'Tambah User'])

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('jabatan.index') }}" class="btn btn-sm btn-danger float-right">
            <i class="fas fa-undo"></i> Kembali
        </a>
    </div>

    <div class="card-body">
        <form action="{{route('jabatan.update', $jabatan->id )}}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror"
                    value="{{ $jabatan->jabatan }}">
                @error('jabatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection

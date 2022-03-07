@extends('layout.main-admin', ['title' => 'Data Cabang', 'titlecontent' => 'Tambah User'])

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('cabang.index') }}" class="btn btn-sm btn-danger float-right">
            <i class="fas fa-undo"></i> Kembali
        </a>
    </div>

    <div class="card-body">
        <form action="{{route('cabang.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Cabang</label> <small class="text-danger">*</small>
                <input type="text" name="cabang" class="form-control @error('cabang') is-invalid @enderror"
                    value="{{ @old('cabang') }}">
                @error('cabang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Telephone</label> <small class="text-warning">!</small>
                <input type="number" name="telephone" class="form-control @error('telephone') is-invalid @enderror"
                    value="{{ @old('telephone') }}">
                @error('telephone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Alamat</label> <small class="text-warning">!</small>
                <textarea name="alamat" class="form-control" cols="10" rows="5"></textarea>
                @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
            <button type="reset" class="btn btn-sm btn-secondary"><i class="fas fa-times"></i> Batal</button>
        </form>
    </div>
</div>
@endsection

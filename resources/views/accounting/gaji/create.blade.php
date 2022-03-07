@extends('layout.main-accounting', ['title' => 'Tambah Gaji'])

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('accounting.gaji.index') }}" class="btn btn-sm btn-danger float-right">
            <i class="fas fa-undo"></i> Kembali
        </a>
    </div>

    <div class="card-body">
        <form action="{{route('accounting.gaji.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Karyawan</label> <small class="text-danger">*</small>
                        <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                            <option value="" class="text-danger" aria-readonly="on">- Pilih Karyawan -</option>
                            @foreach ($users as $user)
                            @if ($user->cabang_id == Auth::user()->cabang_id)
                            <option value="{{$user->id}}">{{Str::ucfirst($user->nama_lengkap)}}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('user_id')
                        <div class=" invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Periode</label> <small class="text-danger">*</small>
                        <select name="periode_id" class="form-control @error('periode_id') is-invalid @enderror">
                            <option value="" class="text-danger" aria-readonly="on">- Pilih Periode -</option>
                            @foreach ($periodes as $periode)
                            <option value="{{$periode->id}}">{{Str::ucfirst($periode->tanggal)}}</option>
                            @endforeach
                        </select>
                        @error('periode_id')
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
                        <label>Gaji Harian</label> <small class="text-danger">*</small>
                        <input type="text" name="harian" class="form-control @error('harian') is-invalid @enderror"
                            value="{{ old('harian') }}">
                        @error('harian')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label>Gaji Tunjangan</label> <small class="text-danger">*</small>
                        <input type="text" name="tunjangan"
                            class="form-control @error('tunjangan') is-invalid @enderror"
                            value="{{ old('tunjangan') }}">
                        @error('tunjangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
            <button type="reset" class="btn btn-sm btn-secondary"><i class="fas fa-times"></i> Batal</button>
        </form>
    </div>
</div>
@endsection

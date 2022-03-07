@extends('layout.main-admin', ['title' => 'Data Cabang Perusahaan'])

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('cabang.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Tambah Cabang
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Cabang</th>
                    <th>Telephone</th>
                    <th>Alamat</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($cabangs as $cabang) : ?>
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $cabang->cabang }}</td>
                    <td>{{ $cabang->telephone }}</td>
                    <td>{{ $cabang->alamat }}</td>
                    <td>
                        <a href="{{ route('cabang.edit', $cabang->id) }}" class="btn btn-sm mr-2">
                            <i class="fas fa-user-edit text-success"></i>
                        </a>
                        <form action="{{ route('cabang.destroy', $cabang->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm border-0">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

{{-- Modal Add Periode Absen --}}
<div class="modal fade" id="modalAddCabang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Cabang Perusahaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('cabang.create')}}" method="POST">
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
                        <input type="number" name="telephone"
                            class="form-control @error('telephone') is-invalid @enderror"
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
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i>
                    Batal</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
{{-- End Modal Add Periode Absen --}}


{{-- Modal Update Periode Absen --}}

@foreach ($cabangs as $cabang)
<div class="modal fade" id="modalUpdateCabang{{ $cabang->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Cabang Perusahaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('cabang.update', $cabang->id )}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Cabang</label> <small class="text-danger">*</small>
                        <input type="text" name="cabang" class="form-control @error('cabang') is-invalid @enderror"
                            value="{{ $cabang->cabang }}">
                        @error('cabang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Telephone</label> <small class="text-warning">!</small>
                        <input type="number" name="telephone"
                            class="form-control @error('telephone') is-invalid @enderror"
                            value="{{ $cabang->telephone }}">
                        @error('telephone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Alamat</label> <small class="text-warning">!</small>
                        <textarea name="alamat" class="form-control" cols="10" rows="5">{{ $cabang->alamat }}</textarea>
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i>
                    Batal</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
@endforeach
{{-- End Modal Update Periode Absen --}}

@endsection

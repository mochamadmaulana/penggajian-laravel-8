@extends('layout.main-admin', ['title' => 'Data Jabatan Users'])

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('jabatan.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Tambah Jabatan
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jabatan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($jabatans as $jabatan) : ?>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $jabatan->jabatan }}</td>
                        <td>
                            <a href="{{ route('jabatan.edit', $jabatan->id) }}" class="btn btn-sm mr-2">
                                <i class="fas fa-user-edit text-success"></i>
                            </a>
                            <form action="{{ route('jabatan.destroy', $jabatan->id) }}" method="post" class="d-inline">
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
<div class="modal fade" id="modalAddJabatan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Jabatan Users</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{route('jabatan.store')}}" method="POST">
                @csrf
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ @old('jabatan') }}">
                        @error('jabatan')
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

@foreach ($jabatans as $jabatan)
<div class="modal fade" id="modalUpdateJabatan{{ $jabatan->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Jabatan Users</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{route('jabatan.update', $jabatan->id )}}" method="POST">
                @csrf
                @method('put')
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ $jabatan->jabatan }}">
                        @error('jabatan')
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

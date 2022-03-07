@extends('layout.main-accounting', ['title' => 'Tambah Gaji Karyawan'])

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg">
                <h5>Periode {{ $periode->bulan.'/'.$periode->tahun }}</h5>
            </div>
            <div class="col-lg">
                <a href="{{ route('accounting.gaji') }}" class="btn btn-sm btn-danger float-right"><i class="fas fa-undo"></i> Kembali</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($absens as $absen): ?>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $absen->user->nama_lengkap }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalAddGaji{{ $absen->user->id }}">
                                <i class="fas fa-plus"></i> Gaji
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

{{-- Modal Tambah Gaji --}}
@foreach ($absens as $absen)
<div class="modal fade" id="modalAddGaji{{ $absen->user->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Gaji Karyawan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('accounting.addgajikaryawan', $absen->periode_id, $absen->user_id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Jabatan</label> <small class="text-danger">*</small>
                        <select name="gaji_id" class="form-control @error('jabatan_id') is-invalid @enderror">
                            <option value="" class="text-danger" aria-readonly="on">Jabatan | Perhari | Tunjangan</option>
                            @foreach ($gajis as $gaji)
                                <option value="{{$gaji->id}}">{{ $gaji->jabatan->jabatan.' | '.$gaji->harian.' | '.$gaji->tunjangan }}</option>
                            @endforeach
                        </select>
                        @error('jabatan_id')
                        <div class=" invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
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
</div>
@endforeach
{{-- End Modal Tambah Gaji --}}
@endsection




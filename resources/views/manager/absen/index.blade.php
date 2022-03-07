@extends('layout.main-manager', ['title' => 'Data Absen'])

@section('content')
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalAddAbsen">
            <i class="fas fa-upload"></i> Upload Absen
        </button>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalDownloadAbsen">
            <i class="fas fa-download"></i> Download Absen
        </button>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tahun - Bulan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($periodes as $periode) : ?>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $periode->tanggal }}</td>
                        <td>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->


{{-- Modal Upload Absen --}}
    <div class="modal fade" id="modalAddAbsen">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Absen</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('manager.import') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Pilih File</label><br>
                            <input type="file" name=upload>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i>
                            Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Upload</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
{{-- End Modal Upload Absen --}}

{{-- Modal Download Absen --}}
<div class="modal fade" id="modalDownloadAbsen">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Download Template Absen</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('manager.export') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <label>Cabang</label>
                        <select name="cabang" class="form-control">
                                <option value="" class="text-danger">- Pilih Cabang -</option>
                            @foreach ($cabangs as $cabang)
                                @if (Auth::user()->cabang_id == $cabang->id)
                                    <option value="{{ $cabang->cabang }}" selected>{{ $cabang->cabang }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg">
                                <label>Bulan</label>
                                <input type="text" name="bulan" id="monthpicker" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#monthpicker" autocomplete="off" />
                            </div>
                            <div class="col-lg">
                                <label>Tahun</label>
                                <input type="text" name="tahun" id="yearpicker" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#yearpicker" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i>
                        Batal</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-download"></i> Download</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
{{-- End Modal Download Absen --}}




@endsection

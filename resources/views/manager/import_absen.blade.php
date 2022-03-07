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
                    <th>Nik</th>
                    <th>Nama Lengkap</th>
                    <th>Jabatan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {{-- <?php $no=1; foreach($users as $user) : ?>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $user->nik }}</td>
                        <td>{{ $user->nama_lengkap }}</td>
                        <td>{{ $user->jabatan->jabatan }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalAddAbsen{{ $user->id }}">
                                <i class="fas fa-plus"></i> Absen
                            </button>
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalAddAbsen">
                                <i class="fas fa-edit"></i> Absen
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?> --}}
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
                <form action="{{route('manager.uploadAbsen')}}" method="POST" enctype="multipart/form-data">
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
            <form action="{{route('manager.downloadAbsen')}}" method="POST">
                @csrf
                    <div class="form-group">
                        <label>Cabang</label>
                        <select name="cabang" class="form-control">
                                <option value="">- Pilih Cabang -</option>
                            @foreach ($cabangs as $cabang)
                                <option value="{{$cabang->id}}">{{$cabang->cabang}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Periode</label>
                        <select name="periode" class="form-control">
                                <option value="">- Pilih Periode -</option>
                            @foreach ($periodes as $periode)
                                <option value="{{$periode->id}}">{{$periode->tahun.' - '.$periode->bulan}}</option>
                            @endforeach
                        </select>
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

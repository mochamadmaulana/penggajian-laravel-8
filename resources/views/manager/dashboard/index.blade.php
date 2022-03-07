@extends('layout.main-manager', ['title' => 'Dashboard'])

@section('content')

<div class="row justify-content-center">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Karyawan</span>
                <span class="info-box-number">
                    {{ count($users) }}
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-building"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Cabang Perusahaan</span>
                <span class="info-box-number">
                    {{ count($cabangs) }}
                </span>
            </div>
        </div>
    </div>
</div>

{{--
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-user-cog"></i> Profile Setting</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nik</label>
                            <input type="text" class="form-control" value="100123" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" value="Tatang Sutarman" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" class="form-control" value="Teknisi Lapangan" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Cabang Perusahaan</label>
                            <input type="text" class="form-control" value="Madura" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <button class="btn btn-sm btn-success btn-block" data-toggle="modal"
                                data-target="#modalEditPassword"><i class="fas fa-lock"></i> Edit Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- <div class="modal fade" id="modalEditPassword">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input type="password" name="password2" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i>
                    Batal</button>
                <button type="button" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div> --}}

{{-- <div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="row">
            <div class="col-6">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-tie"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jabatan</span>
                        <span class="info-box-number">
                            Teknisi Lapangan
                        </span>
                    </div>

                </div>
            </div>
            <div class="col-6">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-building"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Cabang Perusahaan</span>
                        <span class="info-box-number">Madura</span>
                    </div>
                </div>
            </div>

            <div class="clearfix hidden-md-up"></div>
        </div>
    </div>
</div> --}}
@endsection

@extends('layout.main-karyawan', ['title' => 'Detail Gaji'])

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('karyawan.gaji.index') }}" class="btn btn-sm btn-danger float-right">
            <i class="fas fa-undo"></i> Kembali
        </a>
    </div>
    <div class="card-body">

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <div class="row">
                                            <div class="col-lg">
                                                <small class="float-right">Periode: {{ $gaji->periode->tanggal }}</small>
                                                <div class="login-logo">
                                                    <img src="/template/images/logo-pt-nn.png" width="30%" height="80%"
                                                        alt="Logo-PT-NN">
                                                </div>
                                            </div>
                                        </div>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nama Lengkap</th>
                                                <th>Jabatan</th>
                                                <th>Email</th>
                                                <th>Cabang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $gaji->user->nama_lengkap }}</td>
                                                <td>{{ $gaji->user->jabatan->jabatan }}</td>
                                                <td>{{ $gaji->user->email }}</td>
                                                <td>{{ $gaji->user->cabang->cabang }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-6">
                                    <p class="lead">Rincian :</p>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Harian</th>
                                                <td>Rp. {{ number_format($gaji->harian) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tunjangan</th>
                                                <td>Rp. {{ number_format($gaji->tunjangan) ?? 0 }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <td>Rp. {{ number_format($gaji->total_gaji) ?? 0 }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <a href="{{ route('karyawan.slip.gaji.show', $gaji->id) }}" rel="noopener" target="_blank"
                                        class="btn btn-sm btn-primary"><i class="fas fa-print"></i> Print</a>
                                    <button type="button" class="btn btn-sm btn-danger float-right"
                                        style="margin-right: 5px;">
                                        <i class="fas fa-download"></i> PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection

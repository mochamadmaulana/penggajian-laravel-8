<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Slip Gaji Print</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
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
                                                <small class="float-right">Periode: {{ $gaji->periode->tanggal
                                                    }}</small>
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


                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>

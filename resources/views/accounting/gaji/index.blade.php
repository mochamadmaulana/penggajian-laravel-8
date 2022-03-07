@extends('layout.main-accounting', ['title' => 'Gaji'])

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('accounting.gaji.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Tambah Gaji
        </a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal Periode</th>
                    <th>Harian</th>
                    <th>Tunjangan</th>
                    <th>Total Gaji</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($gajis as $gaji)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $gaji->user->nama_lengkap}}</td>
                    <td>{{ $gaji->periode->tanggal}}</td>
                    <td>Rp. {{ number_format($gaji->harian) }}</td>
                    <td>Rp. {{ number_format($gaji->tunjangan) }}</td>
                    <td>Rp. {{ number_format($gaji->total_gaji) }}</td>
                    <td>
                        <a href="{{ route('accounting.gaji.show', $gaji->id) }}" class="btn btn-sm text-info">
                            <i class="fas fa-print mr-1"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection



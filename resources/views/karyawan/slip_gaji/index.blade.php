@extends('layout.main-karyawan', ['title' => 'Gaji'])

@section('content')
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal Periode</th>
                    <th>Harian</th>
                    <th>Tunjangan</th>
                    <th>Total Gaji</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gajis as $gaji)
                @if ($gaji->user_id == Auth::user()->id)
                <tr>
                    <td>#</td>
                    <td>{{ $gaji->periode->tanggal }}</td>
                    <td>Rp. {{ number_format($gaji->harian ) }}</td>
                    <td>Rp. {{ number_format($gaji->tunjangan ) }}</td>
                    <td>Rp. {{ number_format($gaji->total_gaji) }}</td>
                    <td>
                        <a href="{{ route('karyawan.gaji.show', $gaji->id) }}" class="btn btn-sm text-info">
                            <i class="fas fa-print mr-1"></i>
                        </a>
                    </td>
                </tr>
                @endif
                @endforeach

            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection

@extends('layout.main-manager', ['title' => 'Karyawan'])

@section('content')
<div class="card">
    {{-- <div class="card-header">
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Tambah User
        </a>
    </div> --}}
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Cabang</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($users as $user): ?>
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$user->nik}}</td>
                    <td>{{$user->nama_lengkap}}</td>
                    <td>{{ Str::ucfirst($user->jabatan->jabatan) }}</td>
                    <td>{{$user->status}}</td>
                    <td>{{$user->cabang->cabang}}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm mr-2">
                            <i class="fas fa-eye text-info"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
@endsection

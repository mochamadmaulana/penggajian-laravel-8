@extends('layout.main-admin', ['title' => 'Periode Absen'])

@section('content')
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($periodes as $periode) : ?>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $periode->tanggal}}</td>
                        <td>
                            <form action="{{ route('periode.destroy', $periode->id) }}" method="post" class="d-inline">
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
@endsection

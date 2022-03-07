@extends('layout.main-karyawan', ['title' => 'Dashboard'])

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Users</span>
                <span class="info-box-number">
                    {{ 0 }}
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
                    {{ 0 }}
                </span>
            </div>
        </div>
    </div>
</div>
@endsection



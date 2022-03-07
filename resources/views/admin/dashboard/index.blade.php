@extends('layout.main-admin', ['title' => 'Dashboard'])

@section('content')

<div class="row justify-content-center">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Users</span>
                <span class="info-box-number">
                    {{ count($users) }}
                </span>
            </div>
        </div>
    </div>
</div>
@endsection

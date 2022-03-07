@extends('layout.main-manager', ['title' => 'Detail Karyawan'])

@section('content')
<div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle"
                 src="/avatar/default.jpg"
                 alt="avatar">
          </div>

          <h3 class="profile-username text-center">{{ $user->nama_lengkap }}</h3>

          <p class="text-muted text-center">{{ ucfirst($user->role) }}</p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Jabatan</b> <small class="float-right">{{ $user->jabatan->jabatan }}</small>
            </li>
            <li class="list-group-item">
              <b>Status</b> <small class="float-right">{{ $user->status }}</small>
            </li>
            <li class="list-group-item">
              <b>Cabang</b> <small class="float-right">{{ $user->cabang->cabang }}</small>
            </li>
          </ul>

          {{-- <a href="#" class="btn btn-primary btn-block"><i class="fas fa-lock"></i> <b>Reset Password</b></a>kw --}}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
            <div class="row">
                <div class="col-lg">
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link active" href="#absen" data-toggle="tab">Absen</a></li>
                      <li class="nav-item"><a class="nav-link" href="#slipGaji" data-toggle="tab">Slip Gaji</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 my-auto">
                    <a class="btn btn-sm btn-danger float-right" href="{{ route('manager.karyawan') }}"><i class="fas fa-undo"></i> Kembali</a>
                </div>
            </div>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="absen">
                    <table id="tableAbsen" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Periode</th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th>6</th>
                                <th>7</th>
                                <th>8</th>
                                <th>9</th>
                                <th>10</th>
                                <th>11</th>
                                <th>12</th>
                                <th>13</th>
                                <th>14</th>
                                <th>15</th>
                                <th>16</th>
                                <th>17</th>
                                <th>18</th>
                                <th>19</th>
                                <th>20</th>
                                <th>21</th>
                                <th>22</th>
                                <th>23</th>
                                <th>24</th>
                                <th>25</th>
                                <th>26</th>
                                <th>27</th>
                                <th>28</th>
                                <th>29</th>
                                <th>30</th>
                                <th>31</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absens as $absen)
                                <tr>
                                    <th>{{$absen->periode->tahun.' - '.$absen->periode->bulan}}</th>
                                    <th>{{$absen->t_1}}</th>
                                    <th>{{$absen->t_2}}</th>
                                    <th>{{$absen->t_3}}</th>
                                    <th>{{$absen->t_4}}</th>
                                    <th>{{$absen->t_5}}</th>
                                    <th>{{$absen->t_6}}</th>
                                    <th>{{$absen->t_7}}</th>
                                    <th>{{$absen->t_8}}</th>
                                    <th>{{$absen->t_9}}</th>
                                    <th>{{$absen->t_10}}</th>
                                    <th>{{$absen->t_11}}</th>
                                    <th>{{$absen->t_12}}</th>
                                    <th>{{$absen->t_13}}</th>
                                    <th>{{$absen->t_14}}</th>
                                    <th>{{$absen->t_15}}</th>
                                    <th>{{$absen->t_16}}</th>
                                    <th>{{$absen->t_17}}</th>
                                    <th>{{$absen->t_18}}</th>
                                    <th>{{$absen->t_19}}</th>
                                    <th>{{$absen->t_20}}</th>
                                    <th>{{$absen->t_21}}</th>
                                    <th>{{$absen->t_22}}</th>
                                    <th>{{$absen->t_23}}</th>
                                    <th>{{$absen->t_24}}</th>
                                    <th>{{$absen->t_25}}</th>
                                    <th>{{$absen->t_26}}</th>
                                    <th>{{$absen->t_27}}</th>
                                    <th>{{$absen->t_28}}</th>
                                    <th>{{$absen->t_29}}</th>
                                    <th>{{$absen->t_30}}</th>
                                    <th>{{$absen->t_31}}</th>
                                    <th>{{$absen->status}}</th>
                                    <th>{{$absen->keterangan}}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- /.tab-pane -->
                <div class="tab-pane" id="slipGaji">
                    <table id="tableSlipGaji" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Periode</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><a href="#" class="badge badge-pill badge-primary"><i class="fas fa-eye"></i> Lihat</a></td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.tab-pane -->

              </div>
              <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

@endsection

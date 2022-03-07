<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\Cabang;
use App\Models\Gaji;
use App\Models\GajiKaryawan;
use App\Models\Jabatan;
use App\Models\Periode;
use App\Models\User;
use Illuminate\Http\Request;

class AccountingGajiKaryawanController extends Controller
{
    public function index($id)
    {
        return view('accounting.gajiKaryawan.index', [
            'users' => User::all(),
            'periode' => Periode::where('id', $id)->first(),
            'gajikaryawans' => GajiKaryawan::with('user', 'gaji', 'periode')->get(),
            'gajis' => Gaji::with('jabatan')->get(),
            'absens' => Absen::with('user', 'periode')->where('periode_id', $id)->get()
        ]);
    }

    public function store(Request $request, $periode_id, $user_id)
    {
        return $this->index($periode_id);
    }
}

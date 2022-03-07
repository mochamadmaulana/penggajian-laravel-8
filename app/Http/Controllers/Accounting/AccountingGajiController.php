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
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AccountingGajiController extends Controller
{
    public function index()
    {
        return view('accounting.gaji.index', [
            'users' => User::all(),
            'periodes' => Periode::all(),
            'gajis' => Gaji::all(),
            'jabatans' => Jabatan::all(),
            'cabangs' => Cabang::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required'],
            'harian' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Data Gaji Gagal Ditambahkan');
            return back()->withErrors($validator)->withInput();
        }

        $data = [
            'user_id' => $request->user_id,
            'periode_id' => $request->periode_id,
            'harian' => $request->harian,
            'tunjangan' => $request->tunjangan,
        ];

        Gaji::create($data);
        Alert::success('Berhasil', 'Data Gaji Berhasil Ditambahkan');

        return redirect()->route('accounting.gaji');
    }

    public function storeGaji(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required'],
            'gaji_id' => ['required'],
            'periode_id' => ['required'],
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Data Gaji Karyawan Gagal Ditambahkan');
            return back()->withErrors($validator)->withInput();
        }

        $totalAbsen = Absen::where(['user_id' => $request->user_id, 'periode_id' => $request->periode_id])->first();
        $data = [
            'user_id' => $request->user_id,
            'gaji_id' => $request->gaji_id,
            'periode_id' => $request->periode_id,
            'total_absen' => $totalAbsen->total_h
        ];

        Gaji::create($data);
        Alert::success('Berhasil', 'Data Gaji Berhasil Ditambahkan');

        return redirect()->route('accounting.gaji');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'cabang_id' => ['required'],
            'jabatan_id' => ['required'],
            'status' => ['required'],
            'harian' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Data Gaji Gagal Diedit');
            return back()->withErrors($validator)->withInput();
        }

        $data = [
            'jabatan_id' => $request->jabatan_id,
            'cabang_id' => $request->cabang_id,
            'status' => $request->status,
            'harian' => $request->harian,
            'tunjangan' => $request->tunjangan,
        ];

        Gaji::where('id', $id)->update($data);
        Alert::success('Berhasil', 'Data Gaji Berhasil Diedit');

        return back();
    }

    public function destroy($id)
    {
        $user = Gaji::where('id', $id)->first();
        $user->delete();
        Alert::success('Berhasil', 'Data Gaji Berhasil Dihapus');

        return redirect()->back();
    }
}

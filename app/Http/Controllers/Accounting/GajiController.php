<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\Cabang;
use App\Models\Gaji;
use App\Models\Jabatan;
use App\Models\Periode;
use App\Models\SlipGaji;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accounting.gaji.index', [
            'users' => User::all(),
            'periodes' => Periode::all(),
            'gajis' => Gaji::with('user', 'periode')->get(),
            'jabatans' => Jabatan::all(),
            'cabangs' => Cabang::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $periodes = Periode::all();
        return view('accounting.gaji.create', compact('users', 'periodes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required'],
            'periode_id' => ['required'],
            'harian' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Gaji Karyawan Gagal Ditambahkan');
            return back()->withErrors($validator)->withInput();
        }

        $get_absen = Absen::where(['user_id' => $request->user_id, 'periode_id' => $request->periode_id])->first();

        $tgl1 = $get_absen->t_1 == 'H' ? 1 : 0;
        $tgl2 = $get_absen->t_2 == 'H' ? 1 : 0;
        $tgl3 = $get_absen->t_3 == 'H' ? 1 : 0;
        $tgl4 = $get_absen->t_4 == 'H' ? 1 : 0;
        $tgl5 = $get_absen->t_5 == 'H' ? 1 : 0;
        $tgl6 = $get_absen->t_6 == 'H' ? 1 : 0;
        $tgl7 = $get_absen->t_7 == 'H' ? 1 : 0;
        $tgl8 = $get_absen->t_8 == 'H' ? 1 : 0;
        $tgl9 = $get_absen->t_9 == 'H' ? 1 : 0;
        $tgl10 = $get_absen->t_10 == 'H' ? 1 : 0;
        $tgl11 = $get_absen->t_11 == 'H' ? 1 : 0;
        $tgl12 = $get_absen->t_12 == 'H' ? 1 : 0;
        $tgl13 = $get_absen->t_13 == 'H' ? 1 : 0;
        $tgl14 = $get_absen->t_14 == 'H' ? 1 : 0;
        $tgl15 = $get_absen->t_15 == 'H' ? 1 : 0;
        $tgl16 = $get_absen->t_16 == 'H' ? 1 : 0;
        $tgl17 = $get_absen->t_17 == 'H' ? 1 : 0;
        $tgl18 = $get_absen->t_18 == 'H' ? 1 : 0;
        $tgl19 = $get_absen->t_19 == 'H' ? 1 : 0;
        $tgl20 = $get_absen->t_20 == 'H' ? 1 : 0;
        $tgl21 = $get_absen->t_21 == 'H' ? 1 : 0;
        $tgl22 = $get_absen->t_22 == 'H' ? 1 : 0;
        $tgl23 = $get_absen->t_23 == 'H' ? 1 : 0;
        $tgl24 = $get_absen->t_24 == 'H' ? 1 : 0;
        $tgl25 = $get_absen->t_25 == 'H' ? 1 : 0;
        $tgl26 = $get_absen->t_26 == 'H' ? 1 : 0;
        $tgl27 = $get_absen->t_27 == 'H' ? 1 : 0;
        $tgl28 = $get_absen->t_28 == 'H' ? 1 : 0;
        $tgl29 = $get_absen->t_29 == 'H' ? 1 : 0;
        $tgl30 = $get_absen->t_30 == 'H' ? 1 : 0;
        $tgl31 = $get_absen->t_31 == 'H' ? 1 : 0;

        $jumlah_hadir = $tgl1+$tgl2+$tgl3+$tgl4+$tgl5+$tgl6+$tgl7+$tgl8+$tgl9+$tgl10+$tgl11+$tgl12+$tgl13+$tgl14+$tgl15+$tgl16+$tgl17+$tgl18+$tgl19+$tgl20+$tgl21+$tgl22+$tgl23+$tgl24+$tgl25+$tgl26+$tgl27+$tgl28+$tgl29+$tgl30+$tgl31;

        $total_gaji = isset($request->tunjangan) ? $request->harian * $jumlah_hadir + $request->tunjangan : $request->harian*$jumlah_hadir;

        $data = [
            'user_id' => $request->user_id,
            'periode_id' => $request->periode_id,
            'harian' => $request->harian,
            'tunjangan' => $request->tunjangan,
            'total_gaji' => $total_gaji,
        ];

        Gaji::create($data);
        $get_gaji = Gaji::where(['user_id' => $request->user_id, 'periode_id' => $request->periode_id])->first();

        SlipGaji::create([
            'user_id' => $get_gaji->user_id,
            'periode_id' => $get_gaji->periode_id,
            'gaji_id' => $get_gaji->id,
        ]);

        Alert::success('Berhasil', 'Gaji Karyawan Berhasil Ditambahkan');

        return redirect()->route('accounting.gaji.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gaji = Gaji::with('user', 'periode')->where('id', $id)->first();
        return view('accounting.gaji.show', compact('gaji'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Gaji::where('id', $id)->first();
        $user->delete();
        Alert::success('Berhasil', 'Data Gaji Berhasil Dihapus');

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\Cabang;
use App\Models\GajiKaryawan;
use App\Models\Jabatan;
use App\Models\SlipGaji;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accounting.karyawan.index', [
            'users' => User::with('jabatan', 'cabang')->get(),
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
        //
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
            'nik' => ['numeric', 'unique:users'],
            'username' => ['required', 'string', 'alpha_num', 'max:20', 'min:5', 'unique:users'],
            'nama_lengkap' => ['required', 'string', 'max:80'],
            'password' => ['required', 'max:10', 'min:3'],
            'role' => ['required', 'string'],
            'jabatan_id' => ['required'],
            'cabang_id' => ['required'],
            'status' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Data user gagal ditambahkan');
            return back()->withErrors($validator)->withInput();
        }

        $data = [
            'nik' => $request->nik,
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'jabatan_id' => $request->jabatan_id,
            'cabang_id' => $request->cabang_id,
            'status' => $request->status,
        ];

        User::create($data);
        Alert::success('Berhasil', 'Data user berhasil ditambahkan');

        return redirect()->route('admin.users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('accounting.karyawan.detail', [
            'user' => User::with('jabatan', 'cabang')->where('id', $id)->first(),
            'gaji_karyawans' => GajiKaryawan::all(),
            'slip_gajis' => SlipGaji::with('user', 'gaji_karyawan', 'absen')-> where('user_id', $id)->get(),
            'absens' => Absen::with('user', 'periode')->where('user_id', $id)->get(),
        ]);
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
            'nik' => ['numeric'],
            'username' => ['required', 'string', 'alpha_num', 'max:20', 'min:5'],
            'nama_lengkap' => ['required', 'string', 'max:80'],
            'role' => ['required', 'string'],
            'jabatan_id' => ['required'],
            'cabang_id' => ['required'],
            'status' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Data user gagal diedit');
            return back()->withErrors($validator)->withInput();
        }

        $data = [
            'nik' => $request->nik,
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'role' => $request->role,
            'jabatan_id' => $request->jabatan_id,
            'cabang_id' => $request->cabang_id,
            'status' => $request->status,
        ];

        User::where('id', $id)->update($data);
        Alert::success('Berhasil', 'Data user berhasil diedit');

        return redirect()->route('admin.users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        Alert::success('Berhasil', 'Data user berhasil dihapus');

        return redirect()->route('admin.users');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\VerifikasiEmail;
use App\Models\Cabang;
use App\Models\Jabatan;
use App\Models\User;
use App\Models\VerifikasiCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::with('jabatan', 'cabang')->orderBy('id', 'desc')->get(),
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
        $jabatans = Jabatan::all();
        $cabangs = Cabang::all();
        return view('admin.users.create', compact('users', 'jabatans', 'cabangs'));
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
            'nik' => ['required', 'unique:users'],
            'email' => ['required', 'email', 'max:35', 'unique:users'],
            'nama_lengkap' => ['required', 'string', 'max:80'],
            'password' => ['required', 'max:10', 'min:3'],
            'role' => ['required', 'string'],
            'jabatan_id' => ['required'],
            'cabang_id' => ['required'],
            'status' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'User gagal ditambahkan');
            return back()->withErrors($validator)->withInput();
        }

        $data = [
            'nik' => $request->nik,
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'jabatan_id' => $request->jabatan_id,
            'cabang_id' => $request->cabang_id,
            'status' => $request->status,
        ];

        User::create($data);

        $verif = [
            'email' => $request->email,
            'code' => mt_rand(1000, 9999),
        ];

        // VerifikasiCode::create($verif);
        // Mail::to($request->email)->send(new VerifikasiEmail($request->email));

        Alert::success('Berhasil', 'User berhasil ditambahkan');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $jabatans = Jabatan::all();
        $cabangs = Cabang::all();
        return view('admin.users.edit', compact('user', 'jabatans', 'cabangs'));
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
            'email' => ['required', 'email', 'max:35'],
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
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'role' => $request->role,
            'password' => Hash::make($request->password) ?? '',
            'jabatan_id' => $request->jabatan_id,
            'cabang_id' => $request->cabang_id,
            'status' => $request->status,
        ];

        User::where('id', $id)->update($data);
        Alert::success('Berhasil', 'Data user berhasil diedit');

        return redirect()->route('users.index');
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
        $code = VerifikasiCode::where('user_id', $id)->first();
        $user->delete();
        $code !== null ? $code->delete() : '';
        Alert::success('Berhasil', 'Data user berhasil dihapus');

        return redirect()->route('users.index');
    }
}

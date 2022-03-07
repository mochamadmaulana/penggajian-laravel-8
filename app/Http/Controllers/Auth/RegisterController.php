<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register', [
            'jabatans' => Jabatan::all(),
            'cabangs' => Cabang::all(),
        ]);
    }

    public function registerStore(Request $request)
    {
        $validate = $request->validate([
            'nik' => ['required', 'numeric', 'unique:users'],
            'username' => ['required', 'string', 'alpha_num', 'max:20', 'min:5', 'unique:users'],
            'nama_lengkap' => ['required', 'string', 'max:80'],
            'password' => ['required', 'max:10', 'min:3'],
            'role' => ['required', 'string'],
            'jabatan_id' => ['required'],
            'cabang_id' => ['required'],
            'status' => ['required', 'string'],
        ]);

        $validate['password'] = Hash::make($validate['password']);

        // dd($request->all());
        User::create($validate);
        Alert::success('Berhasil', 'Registrasi akun berhasil');

        return redirect()->route('login');
    }
}

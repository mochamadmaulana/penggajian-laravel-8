<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginStore(Request $request)
    {
        $request->validate([
            'inputan' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('nik', $request->inputan)->orWhere('email', $request->inputan)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            Alert::success('Berhasil', 'Login berhasil');
            if(Auth::user()->role === 'administrator'){
                return redirect()->route('admin.dashboard');
            }elseif(Auth::user()->role === 'manager'){
                return redirect()->route('manager.dashboard');
            }elseif(Auth::user()->role === 'accounting'){
                return redirect()->route('accounting.dashboard');
            }
            return redirect()->route('karyawan.dashboard');
        } else {
            Alert::error('Gagal', 'Periksa kembali Username/NIK dan Password anda');
            return back();
        }
    }
}

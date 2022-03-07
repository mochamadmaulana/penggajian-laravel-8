<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifikasiEmail;
use App\Models\User;
use App\Models\VerifikasiCode;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VerifikasiEmailController extends Controller
{
    public function index()
    {
        return view('auth.verifikasiCode');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required']
        ]);
        $data = VerifikasiCode::where('code', $request->code)->first();
        if($data){
            User::where('email', $data->email)->update(['aktif' => true]);
            VerifikasiCode::where('code', $request->code)->delete();
            Alert::success('Berhasil', 'Verifikasi email berhasil');
            return redirect()->route('login');
        }else{
            return back()->with('error', 'Verifikasi gagal, periksa kembali inputan code!');
        }
    }

}

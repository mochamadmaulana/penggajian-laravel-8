<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifikasiEmail;
use App\Models\User;
use App\Models\VerifikasiCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RequestCodeController extends Controller
{
    public function index()
    {
        return view('auth.requestCode');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email']
        ]);
        $user = User::whereEmail($request->email)->first();
        $emailRequestCode = VerifikasiCode::whereEmail($request->email)->first();

        if ($user) {
            if($emailRequestCode === null){
                $data = [
                    'email' => $request->email,
                    'code' => mt_rand(1000, 9999),
                ];

                VerifikasiCode::create($data);
                Mail::to($request->email)->send(new VerifikasiEmail($request->email));

                return redirect()->route('verifikasi', $request->email)->with('success', 'Request code berhasil, periksa email masuk anda');
            }else{
                return back()->with('error', 'Email tersebut sudah merequest code, harap periksa kembali email masuk anda!');
            }
        }else{
            return back()->with('error', 'Email belum didaftarkan oleh Admin!');
        }
    }
}

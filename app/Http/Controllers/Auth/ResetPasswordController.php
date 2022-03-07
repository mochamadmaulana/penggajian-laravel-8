<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ResetPasswordController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'max:15', 'min:3', 'confirmed'],
            'password_confirmation' => ['required'],
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Password gagal diedit');
            return back()->withErrors($validator)->withInput();
        }

        User::where('id', $id)->update(['password' => Hash::make($request->password)]);
        Alert::success('Berhasil', 'Password berhasil diedit');

        return back();
    }
}

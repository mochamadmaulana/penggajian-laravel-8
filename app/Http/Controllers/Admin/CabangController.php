<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cabang.index', [
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
        return view('admin.cabang.create');
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
            'cabang' => ['required', 'string', 'max:80'],
            'telephone' => ['required', 'string', 'max:80'],
            'alamat' => ['string', 'max:125'],
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Cabang Perusahaan Gagal Ditambahkan');
            return back()->withErrors($validator)->withInput();
        }

        $data = [
            'cabang' => $request->cabang,
            'telephone' => $request->telephone,
            'alamat' => $request->alamat !== null ? $request->alamat : null,
        ];

        Cabang::create($data);
        Alert::success('Berhasil', 'Cabang Perusahaan Berhasil Ditambahkan');

        return redirect()->route('cabang.index');
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
        $cabang = Cabang::where('id', $id)->first();
        return view('admin.cabang.edit', compact('cabang'));
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
            'cabang' => ['required', 'string', 'max:80'],
            'telephone' => ['required', 'string', 'max:80'],
            'alamat' => ['string', 'max:125'],
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Cabang Perusahaan Gagal Ditambahkan');
            return back()->withErrors($validator)->withInput();
        }

        $data = [
            'cabang' => $request->cabang,
            'telephone' => $request->telephone,
            'alamat' => $request->alamat !== null ? $request->alamat : null,
        ];

        Cabang::where('id', $id)->update($data);
        Alert::success('Berhasil', 'Cabang Perusahaan Berhasil Diedit');

        return redirect()->route('cabang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $periode = Cabang::where('id', $id)->first();
        $periode->delete();
        Alert::success('Berhasil', 'Cabang Perusahaan Berhasil Dihapus');

        return redirect()->route('cabang.index');
    }
}

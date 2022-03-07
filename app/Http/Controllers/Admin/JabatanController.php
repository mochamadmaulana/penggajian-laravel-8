<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jabatan.index', [
            'jabatans' => Jabatan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jabatan.create');
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
            'jabatan' => ['required', 'string', 'max:30'],
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Jabatan Gagal Ditambahkan');
            return back()->withErrors($validator)->withInput();
        }

        $data = [
            'jabatan' => $request->jabatan,
        ];

        Jabatan::create($data);
        Alert::success('Berhasil', 'Jabatan Berhasil Ditambahkan');

        return redirect()->route('jabatan.index');
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
        $jabatan = Jabatan::where('id', $id)->first();
        return view('admin.jabatan.edit', compact('jabatan'));
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
            'jabatan' => ['required', 'string', 'max:30'],
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Jabatan Gagal Diedit');
            return back()->withErrors($validator)->withInput();
        }

        $data = [
            'jabatan' => $request->jabatan,
        ];

        Jabatan::where('id', $id)->update($data);
        Alert::success('Berhasil', 'Jabatan Berhasil Diedit');

        return redirect()->route('jabatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $periode = Jabatan::where('id', $id)->first();
        $periode->delete();
        Alert::success('Berhasil', 'Jabatan Berhasil Dihapus');

        return redirect()->route('jabatan.index');
    }
}

<?php

namespace App\Http\Controllers\Manager;

use App\Exports\TemplateAbsenExport;
use App\Http\Controllers\Controller;
use App\Imports\AbsenImport;
use App\Models\Periode;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ImportAbsenController extends Controller
{

    public function import(Request $request)
    {
        Excel::import(new AbsenImport(), $request->file('upload'));

        Alert::success('Berhasil', 'Data absen berhasil diupload');
        return back();
    }

    public function export(Request $request)
    {
        $tanggal = $request->bulan . '-' . $request->tahun;
        $getTanggal = Periode::where('tanggal', $tanggal)->first();
        if ($getTanggal == null) {
            Periode::create([
                'tanggal' => $tanggal,
            ]);
        }
        $getTanggal = $tanggal;


        $name = 'Template-Absen-' . $request->cabang . '-' . $getTanggal;
        return (new TemplateAbsenExport)->params($request->cabang, $getTanggal)->download($name . '.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
}

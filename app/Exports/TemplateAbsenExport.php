<?php

namespace App\Exports;

use App\Models\Cabang;
use App\Models\Periode;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TemplateAbsenExport implements FromView, ShouldAutoSize, WithStyles
{
    use Exportable;

    public function params($cabang, $tanggal)
    {
        $this->cabang = $cabang;
        $this->tanggal = $tanggal;
        return $this;
    }

    public function query()
    {
        $namaCabang = Cabang::where('cabang', $this->cabang)->first();
        return User::with('jabatan', 'cabang')->where('cabang_id', $namaCabang->id)->get();
    }

    public function view(): View
    {
        return view('exports.absen', [
            'tanggal' => $this->tanggal,
            'users' => $this->query(),
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => [
                'font' => ['bold' => true],
                'fill' => [
                    'color' => ['rgb' => '#08df13'],
                ]
            ],
        ];
    }
}

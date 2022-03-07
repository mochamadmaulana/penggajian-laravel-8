<?php

namespace App\Imports;

use App\Models\Absen;
use App\Models\Periode;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbsenImport implements ToModel, WithHeadingRow
{

    private $users;
    private $periodes;

    public function __construct()
    {
        $this->users = User::select('id', 'nik')->get();
        $this->periodes = Periode::select('id', 'tanggal')->get();
    }

    public function model(array $row)
    {
        $user = $this->users->where('nik', $row['nik'])->first();
        $periode = $this->periodes->where('tanggal', $row['tanggal'])->first();
        return new Absen([
            'user_id'  => $user->id,
            'periode_id'  => $periode->id,
            't_1'  => $row['1'],
            't_2'  => $row['2'],
            't_3'  => $row['3'],
            't_4'  => $row['4'],
            't_5'  => $row['5'],
            't_6'  => $row['6'],
            't_7'  => $row['7'],
            't_8'  => $row['8'],
            't_9'  => $row['9'],
            't_10'  => $row['10'],
            't_11'  => $row['11'],
            't_12'  => $row['12'],
            't_13'  => $row['13'],
            't_14'  => $row['14'],
            't_15'  => $row['15'],
            't_16'  => $row['16'],
            't_17'  => $row['17'],
            't_18'  => $row['18'],
            't_19'  => $row['19'],
            't_20'  => $row['20'],
            't_21'  => $row['21'],
            't_22'  => $row['22'],
            't_23'  => $row['23'],
            't_24'  => $row['24'],
            't_25'  => $row['25'],
            't_26'  => $row['26'],
            't_27'  => $row['27'],
            't_28'  => $row['28'],
            't_29'  => $row['29'],
            't_30'  => $row['30'],
            't_31'  => $row['31'],
            // 'total_hadir'  => $row['32'],
            // 'total_alpha'  => $row['33'],
            // 'total_izin'  => $row['34'],
            // 'total_cuti'  => $row['35'],
        ]);
    }
}

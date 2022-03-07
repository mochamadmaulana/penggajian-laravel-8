<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $table = 'absen';

    protected $fillable = [
        'user_id',
        'periode_id',
        't_1',
        't_2',
        't_3',
        't_4',
        't_5',
        't_6',
        't_7',
        't_8',
        't_9',
        't_10',
        't_11',
        't_12',
        't_13',
        't_14',
        't_15',
        't_16',
        't_17',
        't_18',
        't_19',
        't_20',
        't_21',
        't_22',
        't_23',
        't_24',
        't_25',
        't_26',
        't_27',
        't_28',
        't_29',
        't_30',
        't_31',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id', 'id');
    }
}

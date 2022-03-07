<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $table = 'periode';

    protected $fillable = [
        'tanggal',
    ];

    public function absen()
    {
        return $this->hasMany(Absen::class, 'periode_id', 'id');
    }

    public function slipgaji()
    {
        return $this->hasMany(SlipGaji::class, 'periode_id', 'id');
    }
}

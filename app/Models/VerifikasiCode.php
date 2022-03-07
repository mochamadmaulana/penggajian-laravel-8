<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class VerifikasiCode extends Model
{
    use HasFactory;

    protected $table = 'verifikasi_code';

    protected $fillable = [
        'email',
        'code'
    ];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d, F Y H:i');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;

    protected $table = 'cabang';

    protected $fillable = [
        'cabang',
        'alamat',
        'telephone',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'cabang_id', 'id');
    }

    public function gaji()
    {
        return $this->hasMany(Gaji::class, 'cabang_id', 'id');
    }
}

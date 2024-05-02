<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'kelasjurusan_ta_id',
        'siswakelas_id',
        'absensi',
        'keterangan',  
    ];
}

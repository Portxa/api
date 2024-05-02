<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class config extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'alamat', 'telp', 'website', 'email', 'foto_sekolah',
        'logo', 'nama_kepsek', 'foto_kepsek', 'ig', 'fb', 'tiktok', 'yt'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bacaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'penulis_id',
        'terbit',
        'isbn',
        'cover',
        'ringkasan',
        'penerbit_id',
        'link',
    ];
}

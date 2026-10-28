<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    protected $table = 'penghuni';

    protected $fillable = [
        'nama',
        'no_ktp',
        'pekerjaan',
        'no_kamar',
        'kontak_darurat',
    ];
}

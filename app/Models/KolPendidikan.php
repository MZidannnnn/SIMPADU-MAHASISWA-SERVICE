<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KolPendidikan extends Model
{
    //
    protected $table = 'kol_pendidikan';
    protected $primaryKey = 'id_pendidikan';
    protected $fillable = [
        'id_pendidikan',
        'nama_pendidikan',
    ];
}

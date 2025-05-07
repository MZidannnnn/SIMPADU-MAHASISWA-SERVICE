<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KolAgama extends Model
{
    //
    protected $table = 'kol_agama';  // Nama tabel
    protected $primaryKey = 'id_agama';  // Primary key

    protected $fillable = [
        'id_agama',
        'nama_agama',
    ];
}

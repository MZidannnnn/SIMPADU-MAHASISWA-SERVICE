<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KolDarah extends Model
{
    protected $table = 'kol_darah';
    protected $primaryKey = 'id_darah';
    //
    protected $fillable = [
        'id_darah',
        'nama_darah',
    ];
}

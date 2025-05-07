<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KolJk extends Model
{
    //
    protected $table = 'kol_jk';
    protected $primaryKey = 'id_jk';

    protected $fillable = [
        'id_jk',
        'nama_jk',
        'ket',
    ];
}

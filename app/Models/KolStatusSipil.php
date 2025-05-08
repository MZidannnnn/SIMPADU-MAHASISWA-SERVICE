<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KolStatusSipil extends Model
{
    //
    protected $table = 'kol_status_sipil';
    protected $primaryKey = 'id_status_sipil';

    protected $fillable = [
        'id_status_sipil',
        'nama_status_sipil',
    ];
}

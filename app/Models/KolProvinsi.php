<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KolProvinsi extends Model
{
    //
    protected $table = 'kol_provinsi';
    protected $primaryKey = 'id_prov';

    protected $fillable = [
        'id_prov',
        'nama_prov',
    ];
}

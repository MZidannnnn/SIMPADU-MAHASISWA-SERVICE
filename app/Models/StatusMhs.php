<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusMhs extends Model
{
    //
    protected $table = 'siap_status_mhs';
    protected $primaryKey = 'id_status_mhs';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_status_mhs',
        'nama_status_mhs',
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_status_mhs', 'id_status_mhs');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeringatanMhs extends Model
{
    //
    protected $table = 'siap_peringatan_mhs';
    protected $primaryKey = 'id_status_peringatan';

    protected $fillable = [
        'id_status_peringatan',
        'nama_status_peringatan',
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_status_peringatan', 'id_status_peringatan');
    }
}

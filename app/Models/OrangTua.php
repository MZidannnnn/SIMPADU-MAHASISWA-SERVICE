<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    //
    protected $table = 'siap_ortu_mhs';  // Nama tabel
    protected $primaryKey = 'id_ortu';
    public $incrementing = true;

    protected $keyType = 'int';



    protected $fillable = [
        'nim',
        'nama_ortu',
        'nik_ortu',
        'id_agama',
        'id_pendidikan',
        'id_pekerjaan',
        'id_status_hidup',
        'id_penghasilan',
        'id_kabupaten',
        'id_prov',
        'negara_ortu',
        'handphone_ortu',
        'email_ortu',
        'tgl_lahir_ortu',
        'id_hubungan',

    ];


    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }
}

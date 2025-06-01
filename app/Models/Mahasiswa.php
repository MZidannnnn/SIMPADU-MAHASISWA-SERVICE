<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'siap_mhs';  // Nama tabel
    protected $primaryKey = 'nim';  // Primary key
    public $incrementing = false;   // Penting! Karena NIM bukan auto-increment
    protected $keyType = 'string';  // Penting! Karena NIM berupa string


    protected $fillable = [
        'nim',
        'id_kategori_spp',
        'thn_ak_masuk',
        'thn_ak_lulus',
        'nama_mhs',
        'nik_mhs',
        'nisn',
        'id_status_mhs',
        'id_prodi',
        'id_jk',
        'id_darah',
        'warga_negara',
        'kebangsaan',
        'tempat_lahir',
        'tgl_lahir',
        'id_agama',
        'id_status_sipil',
        'id_wil',
        'id_kabupaten',
        'id_prov',
        'handphone',
        'email',
        'sekolah_asal',
        'id_jurusan_sekolah',
        'nilai_sekolah',
        'tgl_lulus',
        'IPK',
        'id_status_peringatan',
        'foto_ktp',
        'foto_ijasah',
        'foto_transkip',
        'foto_kk',
        'foto_ak',
        'foto_sehat',
        'foto_warna',
    ];

    public function ortu()
    {
        return $this->hasOne(OrangTua::class, 'nim', 'nim');
    }
    public function status()
    {
        return $this->belongsTo(StatusMhs::class, 'id_status_mhs', 'id_status_mhs');
    }
    public function peringatan()
    {
        return $this->belongsTo(PeringatanMhs::class, 'id_status_peringatan', 'id_status_peringatan');
    }
}

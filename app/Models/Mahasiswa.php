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
        'nim', 'nama_mhs', 'jk', 'tempat_lahir', 'tgl_lahir', 'id_prodi',
        'kelas', 'nilai_masuk', 'thn_ak_masuk', 'thn_ak_lulus', 'ipk', 'email',
        'handphone', 'alamat', 'id_status_aktif_mhs', 'foto',
    ];

    // protected $casts = [
    //     'nilai_masuk' => 'decimal:2',
    //     'ipk' => 'decimal:2',
    //     'tgl_lahir' => 'date',
    // ];

}

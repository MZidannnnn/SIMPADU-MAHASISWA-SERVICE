<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengumuman extends Model
{
    //
    use HasFactory;

    protected $table = 'pengumumans'; // <-- pastikan ini
    protected $fillable = ['judul', 'isi', 'gambar'];

}

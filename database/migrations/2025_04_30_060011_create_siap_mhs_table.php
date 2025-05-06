<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siap_mhs', function (Blueprint $table) {
            $table->char('nim', 16)->primary();                    // primary key
            $table->string('nama_mhs', 145);                        // nama mahasiswa
            $table->char('jk', 1)->nullable();                      // jenis kelamin (nullable)
            $table->string('tempat_lahir', 50)->nullable();         // tempat lahir (nullable)
            $table->date('tgl_lahir')->nullable();                  // tanggal lahir (nullable)
            $table->tinyInteger('id_prodi')->nullable();            // id_prodi (nullable)
            $table->char('kelas', 3);                               // kelas
            $table->decimal('nilai_masuk', 4, 2)->nullable();       // nilai masuk (nullable untuk SNBP)
            $table->char('thn_ak_masuk', 5);                        // tahun akademik masuk
            $table->char('thn_ak_lulus', 5);                        // tahun akademik lulus
            $table->decimal('ipk', 4, 2);                           // IPK
            $table->string('email', 100)->nullable();               // email (nullable)
            $table->string('handphone', 50)->nullable();            // handphone (nullable)
            $table->string('alamat', 255)->nullable();              // alamat (nullable)
            $table->integer('id_status_aktif_mhs');                 // status aktif mahasiswa
            $table->string('foto')->default('blm_ada_foto.jpg');  // foto profil default
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siap_mhs');
    }
};

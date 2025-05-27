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
            $table->char('nim', 10)->primary();
            $table->smallInteger('id_kategori_spp')->default(0); // id kategori spp
            $table->char('thn_ak_masuk', 5)->nullable();                        // tahun akademik masuk
            $table->char('thn_ak_lulus', 5)->nullable();                        // tahun akademik lulus
            $table->string('nama_mhs', 145);                        // nama mahasiswa
            $table->char('nik_mhs', 16)->default(0)->unique(); // nik mahasiswa unik, bukan primary
            $table->char('nisn', 16)->unique();               // nisn juga unik, bukan primary
            $table->char('id_status_mhs', 1)->default('');                        // nik mahasiswa
            $table->tinyInteger('id_prodi');            // id_prodi (nullable)
            $table->smallInteger('id_jk')->nullable();                      // jenis kelamin (nullable)
            $table->smallInteger('id_darah')->default('0');             // golongan darah
            $table->char('warga_negara', 3)->nullable();             // warga negara (nullable)
            $table->string('kebangsaan', 50)->nullable();             // kebangsaan (nullable)
            $table->string('tempat_lahir', 50)->nullable();         // tempat lahir (nullable)
            $table->date('tgl_lahir')->nullable();                  // tanggal lahir (nullable)
            $table->tinyInteger('id_agama')->nullable();             // id agama (nullable)
            $table->char('id_status_sipil', 1)->nullable();             // status sipil (nullable)
            $table->char('id_wil', 8);                     // id wilayah
            $table->char('id_kabupaten', 10)->default('0');
            $table->char('id_prov', 9)->default('0');
            $table->string('handphone', 50)->nullable();            // handphone (nullable)
            $table->string('email', 100)->nullable();               // email (nullable)
            $table->string('sekolah_asal', 100)->nullable();
            $table->integer('id_jurusan_sekolah')->nullable();
            $table->float('nilai_sekolah')->nullable();
            $table->date('tgl_lulus')->nullable()->comment('Lulus dari perguruan tinggi');
            $table->decimal('IPK', 4, 2)->default(0.00);
            $table->string('foto_profile')->default('blm_ada_foto.png');  // foto profil default
            $table->string('foto_ktp')->default('blm_ada_foto.png');
            $table->string('foto_ijasah')->default('blm_ada_foto.png');
            $table->string('foto_transkip')->default('blm_ada_foto.png');
            $table->string('foto_kk')->default('blm_ada_foto.png');
            $table->string('foto_ak')->default('blm_ada_foto.png');
            $table->string('foto_sehat')->default('blm_ada_foto.png');
            $table->string('foto_warna')->default('blm_ada_foto.png');
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

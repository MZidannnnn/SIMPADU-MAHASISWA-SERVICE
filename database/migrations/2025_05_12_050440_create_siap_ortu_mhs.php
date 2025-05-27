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
        Schema::create('siap_ortu_mhs', function (Blueprint $table) {
            $table->id('id_ortu'); // PRIMARY KEY, AUTO_INCREMENT

            $table->char('nim', 10); // FK ke mahasiswa (disarankan nanti relasi)
            $table->string('nama_ortu', 50)->nullable();
            $table->char('nik_ortu', 16)->default('0')->unique();
            $table->tinyInteger('id_agama')->nullable();
            $table->char('id_pendidikan', 2)->nullable();
            $table->char('id_pekerjaan', 1)->nullable();
            $table->char('id_status_hidup', 1)->nullable();
            $table->tinyInteger('id_penghasilan')->default(0);
            $table->char('id_kabupaten', 10)->default('0');
            $table->char('id_prov', 9)->default('0');
            $table->string('negara_ortu', 50)->nullable();
            $table->string('handphone_ortu', 50)->nullable();
            $table->string('email_ortu', 100)->nullable();
            $table->date('tgl_lahir_ortu')->nullable();
            $table->integer('id_hubungan')->nullable(); // relasi ke kol_hubungan

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siap_ortu_mhs');
    }
};

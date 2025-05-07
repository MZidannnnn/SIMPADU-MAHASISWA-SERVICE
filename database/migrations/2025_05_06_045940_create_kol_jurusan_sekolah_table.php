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
        Schema::create('kol_jurusan_sekolah', function (Blueprint $table) {
            $table->char('id_jurusan_sekolah', 50)->primary()->collation('latin1_general_ci');
            $table->string('nama', 50)->collation('latin1_general_ci');
            $table->string('nama_jurusan', 100)->collation('latin1_general_ci');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kol_jurusan_sekolah');
    }
};

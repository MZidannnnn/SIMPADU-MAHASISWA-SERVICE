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
        Schema::create('siap_status_mhs', function (Blueprint $table) {
            $table->char('id_status_mhs', 1)->primary(); // PRIMARY KEY
            $table->string('nama_status_mhs', 50); // status mahasiswa
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siap_status_mhs');
    }
};

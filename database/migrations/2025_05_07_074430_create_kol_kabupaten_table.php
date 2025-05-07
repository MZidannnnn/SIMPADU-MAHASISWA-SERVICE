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
        Schema::create('kol_kabupaten', function (Blueprint $table) {
            $table->char('id_kabupaten', 10)->primary()->collation('latin1_general_ci');
            $table->string('nama_kabupaten', 50)->collation('latin1_general_ci');
            $table->char('id_prov', 2)->collation('latin1_general_ci');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kol_kabupaten');
    }
};

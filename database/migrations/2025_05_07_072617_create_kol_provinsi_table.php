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
        Schema::create('kol_provinsi', function (Blueprint $table) {
            $table->char('id_prov', 2)->primary()->collation('latin1_general_ci');
            $table->tinyText('nama_prov')->collation('latin1_general_ci');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kol_provinsi');
    }
};

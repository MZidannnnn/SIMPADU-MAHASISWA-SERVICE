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
        Schema::create('kol_agama', function (Blueprint $table) {
            $table->tinyInteger('id_agama')->length(3)->primary()->default('0');
            $table->string('nama_agama', 100)->collation('latin1_general_ci');
            $table->tinyInteger('id_feeder')->length(3)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kol_agama');
    }
};

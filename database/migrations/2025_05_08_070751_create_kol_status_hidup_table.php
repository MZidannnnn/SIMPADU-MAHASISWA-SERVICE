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
        Schema::create('kol_status_hidup', function (Blueprint $table) {
            $table->char('id_status_hidup', 1)->primary()->collation('latin1_general_ci');
            $table->string('nama_status_hidup', 50)->collation('latin1_general_ci')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kol_status_hidup');
    }
};

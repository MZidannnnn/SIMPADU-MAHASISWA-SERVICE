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
        Schema::create('kol_penghasilan', function (Blueprint $table) {
            $table->tinyInteger('id_penghasilan')->primary()->default(0);
            $table->char('nama_penghasilan', 30)->collation('latin1_general_ci')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kol_penghasilan');
    }
};

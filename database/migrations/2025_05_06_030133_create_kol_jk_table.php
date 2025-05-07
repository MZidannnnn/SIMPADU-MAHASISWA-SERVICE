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
        Schema::create('kol_jk', function (Blueprint $table) {
            $table->smallInteger('id_jk')->primary()->autoIncrement();
            $table->text('nama_jk')->collation('latin1_general_ci');
            $table->string('ket', 15)->collation('latin1_general_ci');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kol_jk');
    }
};

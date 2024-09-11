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
        Schema::create('tb_kompetensi_dasar', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('mata_pelajaran_id')->constrained('tb_mata_pelajaran')->onDelete('cascade')->onUpdate('cascade');
            $table->text('kompetensi_dasar');
            $table->text('indikator');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_kompetensi_dasar');
    }
};

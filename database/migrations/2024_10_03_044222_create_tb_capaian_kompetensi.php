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
        Schema::create('tb_capaian_kompetensi', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('mata_pelajaran_id')->constrained('tb_mata_pelajaran')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tipe_capaian');
            $table->string('kode');
            $table->string('deskripsi');
            $table->string('ringkasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_capaian_kompetensi');
    }
};

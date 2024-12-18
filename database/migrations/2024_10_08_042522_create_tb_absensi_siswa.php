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
        Schema::create('tb_absensi_siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mata_pelajaran_id')->constrained('tb_mata_pelajaran')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('siswa_id')->constrained('tb_siswa')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggal');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_absensi_siswa');
    }
};

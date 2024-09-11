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
        Schema::create('tb_jurnal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kompetensi_id')->constrained('tb_kompetensi_dasar')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('kelas_id')->constrained('tb_kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('materi');
            $table->string('hasil');
            $table->integer('hadir');
            $table->integer('tidak_hadir');
            $table->date('tanggal');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jurnal');
    }
};

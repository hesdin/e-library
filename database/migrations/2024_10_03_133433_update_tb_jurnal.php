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
        Schema::table('tb_jurnal', function (Blueprint $table) {
            $table->foreignId('mata_pelajaran_id')->constrained('tb_mata_pelajaran')->onDelete('cascade')->onUpdate('cascade')->after('kelas_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_jurnal', function (Blueprint $table) {
            //
        });
    }
};

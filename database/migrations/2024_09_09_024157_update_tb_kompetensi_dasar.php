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
        Schema::table('tb_kompetensi_dasar', function (Blueprint $table) {
            $table->renameColumn('kompetensi_dasar', 'kompetensi_inti');
            $table->renameColumn('indikator', 'kompetensi_dasar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

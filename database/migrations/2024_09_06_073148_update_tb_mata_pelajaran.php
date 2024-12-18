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
        Schema::table('tb_mata_pelajaran', function (Blueprint $table) {
            if (!Schema::hasColumn('tb_mata_pelajaran', 'tenaga_kependidikan_id')) {
                $table->foreignId('tenaga_kependidikan_id')
                    ->constrained('tb_tenaga_kependidikan')
                    ->onDelete('cascade')
                    ->onUpdate('cascade')
                    ->after('uuid');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_mata_pelajaran', function (Blueprint $table) {
            $table->dropForeign(['tenaga_kependidikan_id']);
            $table->dropColumn('tenaga_kependidikan_id');
        });
    }
};

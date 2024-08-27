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
        Schema::create('tb_tenaga_kependidikan', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string("nip");
            $table->string("nama");
            $table->string("jenis_kelamin");
            $table->string("tempat_lahir");
            $table->date("tanggal_lahir");
            $table->string("nuptk");
            $table->enum("status_kepegawaian",["PNS","PPPK","HONORER"]);
            $table->string("jabatan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_tenaga_kependidikan');
    }
};

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
        Schema::create('tb_sumber_belajar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topik_id')->constrained('tb_topik')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('mata_pelajaran_id')->constrained('tb_mata_pelajaran')->onDelete('cascade')->onUpdate('cascade');
            $table->string("judul");
            $table->enum("tingkatan",["X","XI","XII"]);
            $table->enum("kategori",["ebook","video"]);
            $table->string("youtube_url")->nullable();
            $table->string("file_url")->nullable();
            $table->string("deskripsi");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_sumber_belajar');
    }
};

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
        Schema::table('tb_siswa', function (Blueprint $table) {
            if (!Schema::hasColumn('tb_siswa', 'id')) {
                $table->bigIncrements('id');
            }
            if (!Schema::hasColumn('tb_siswa', 'uuid')) {
                $table->char('uuid', 36)->notNull();
            }
            if (!Schema::hasColumn('tb_siswa', 'kelas_id')) {
                $table->unsignedBigInteger('kelas_id')->notNull();
            }
            if (!Schema::hasColumn('tb_siswa', 'nipd')) {
                $table->string('nipd')->notNull();
            }
            if (!Schema::hasColumn('tb_siswa', 'nisn')) {
                $table->string('nisn')->notNull();
            }
            if (!Schema::hasColumn('tb_siswa', 'username')) {
                $table->string('username')->notNull();
            }
            if (!Schema::hasColumn('tb_siswa', 'password')) {
                $table->string('password')->notNull();
            }
            if (!Schema::hasColumn('tb_siswa', 'jenis_kelamin')) {
                $table->string('jenis_kelamin')->notNull();
            }
            if (!Schema::hasColumn('tb_siswa', 'tempat_lahir')) {
                $table->string('tempat_lahir')->notNull();
            }
            if (!Schema::hasColumn('tb_siswa', 'tanggal_lahir')) {
                $table->date('tanggal_lahir')->notNull();
            }
            if (!Schema::hasColumn('tb_siswa', 'alamat')) {
                $table->string('alamat')->notNull();
            }
            if (!Schema::hasColumn('tb_siswa', 'nomor_whatsaap')) {
                $table->string('nomor_whatsaap')->notNull();
            }
            if (!Schema::hasColumn('tb_siswa', 'nama_wali')) {
                $table->string('nama_wali')->nullable();
            }
            if (!Schema::hasColumn('tb_siswa', 'pekerjaan_wali')) {
                $table->string('pekerjaan_wali')->nullable();
            }
            if (!Schema::hasColumn('tb_siswa', 'penghasilan_wali')) {
                $table->integer('penghasilan_wali')->nullable();
            }
            if (!Schema::hasColumn('tb_siswa', 'created_at')) {
                $table->timestamp('created_at')->nullable();
            }
            if (!Schema::hasColumn('tb_siswa', 'updated_at')) {
                $table->timestamp('updated_at')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_siswa', function (Blueprint $table) {
            $table->dropColumn([
                'id',
                'uuid',
                'kelas_id',
                'nipd',
                'nisn',
                'username',
                'password',
                'jenis_kelamin',
                'tempat_lahir',
                'tanggal_lahir',
                'alamat',
                'nomor_whatsaap',
                'nama_wali',
                'pekerjaan_wali',
                'penghasilan_wali',
                'created_at',
                'updated_at',
            ]);
        });
    }
};

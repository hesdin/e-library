<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsensiSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get mata pelajaran and siswa IDs
        $mataPelajaranIds = DB::table('tb_mata_pelajaran')->pluck('id')->toArray();
        $siswaIds = DB::table('tb_siswa')->pluck('id')->toArray();

        if (empty($mataPelajaranIds)) {
            echo "⚠️  No mata pelajaran found. Please run MataPelajaranSeeder first.\n";
            return;
        }

        if (empty($siswaIds)) {
            echo "⚠️  No siswa found. Please run SiswaSeeder first.\n";
            return;
        }

        $absensi = [
            [
                'mata_pelajaran_id' => $mataPelajaranIds[0] ?? 1,
                'siswa_id' => $siswaIds[0] ?? 1,
                'tanggal' => now()->subDays(5)->format('Y-m-d'),
                'status' => 'Hadir',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mata_pelajaran_id' => $mataPelajaranIds[1] ?? 1,
                'siswa_id' => $siswaIds[1] ?? 1,
                'tanggal' => now()->subDays(3)->format('Y-m-d'),
                'status' => 'Hadir',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mata_pelajaran_id' => $mataPelajaranIds[2] ?? 1,
                'siswa_id' => $siswaIds[2] ?? 1,
                'tanggal' => now()->subDays(1)->format('Y-m-d'),
                'status' => 'Sakit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('tb_absensi_siswa')->insert($absensi);

        echo "✅ 3 Absensi Siswa data created successfully!\n";
    }
}

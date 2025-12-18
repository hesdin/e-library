<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurnalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get kompetensi dasar and kelas IDs
        $kompetensiIds = DB::table('tb_kompetensi_dasar')->pluck('id')->toArray();
        $kelasIds = DB::table('tb_kelas')->pluck('id')->toArray();
        $mataPelajaranIds = DB::table('tb_mata_pelajaran')->pluck('id')->toArray();

        if (empty($kompetensiIds)) {
            echo "⚠️  No kompetensi dasar found. Please run KompetensiDasarSeeder first.\n";
            return;
        }

        if (empty($kelasIds)) {
            echo "⚠️  No kelas found. Please run KelasSeeder first.\n";
            return;
        }

        if (empty($mataPelajaranIds)) {
            echo "⚠️  No mata pelajaran found. Please run MataPelajaranSeeder first.\n";
            return;
        }

        $jurnals = [
            [
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'kompetensi_id' => $kompetensiIds[0] ?? 1,
                'kelas_id' => $kelasIds[0] ?? 1,
                'mata_pelajaran_id' => $mataPelajaranIds[0] ?? 1,
                'materi' => 'Operasi Bilangan Bulat',
                'hasil' => 'Siswa dapat memahami konsep bilangan bulat positif dan negatif',
                'hadir' => 28,
                'tidak_hadir' => 2,
                'tanggal' => now()->subDays(5)->format('Y-m-d'),
                'keterangan' => 'Pembelajaran berjalan lancar, siswa aktif bertanya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'kompetensi_id' => $kompetensiIds[1] ?? 1,
                'kelas_id' => $kelasIds[1] ?? 1,
                'mata_pelajaran_id' => $mataPelajaranIds[1] ?? 1,
                'materi' => 'Struktur Teks Eksposisi',
                'hasil' => 'Siswa dapat mengidentifikasi bagian-bagian teks eksposisi',
                'hadir' => 30,
                'tidak_hadir' => 0,
                'tanggal' => now()->subDays(3)->format('Y-m-d'),
                'keterangan' => 'Semua siswa hadir dan antusias dalam diskusi kelompok',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'kompetensi_id' => $kompetensiIds[2] ?? 1,
                'kelas_id' => $kelasIds[2] ?? 1,
                'mata_pelajaran_id' => $mataPelajaranIds[2] ?? 1,
                'materi' => 'Sistem Pencernaan Manusia',
                'hasil' => 'Siswa dapat menyebutkan organ-organ pencernaan dan fungsinya',
                'hadir' => 27,
                'tidak_hadir' => 3,
                'tanggal' => now()->subDays(1)->format('Y-m-d'),
                'keterangan' => 'Pembelajaran menggunakan media video dan model anatomi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('tb_jurnal')->insert($jurnals);

        echo "✅ 3 Jurnal data created successfully!\n";
    }
}

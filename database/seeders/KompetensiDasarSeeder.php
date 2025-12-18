<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid as Generator;

class KompetensiDasarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get mata pelajaran IDs
        $mataPelajaranIds = DB::table('tb_mata_pelajaran')->pluck('id')->toArray();

        if (empty($mataPelajaranIds)) {
            echo "⚠️  No mata pelajaran found. Please run MataPelajaranSeeder first.\n";
            return;
        }

        $kompetensiDasar = [
            [
                'uuid' => Generator::uuid4()->toString(),
                'mata_pelajaran_id' => $mataPelajaranIds[0] ?? 1,
                'kompetensi_inti' => 'Memahami konsep bilangan bulat dan operasinya',
                'kompetensi_dasar' => 'Siswa dapat melakukan operasi penjumlahan, pengurangan, perkalian, dan pembagian bilangan bulat dengan benar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Generator::uuid4()->toString(),
                'mata_pelajaran_id' => $mataPelajaranIds[1] ?? 1,
                'kompetensi_inti' => 'Menganalisis struktur teks eksposisi',
                'kompetensi_dasar' => 'Siswa dapat mengidentifikasi struktur tesis, argumentasi, dan penegasan ulang dalam teks eksposisi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Generator::uuid4()->toString(),
                'mata_pelajaran_id' => $mataPelajaranIds[2] ?? 1,
                'kompetensi_inti' => 'Memahami sistem pencernaan pada manusia',
                'kompetensi_dasar' => 'Siswa dapat menjelaskan organ-organ pencernaan dan fungsinya dalam sistem pencernaan manusia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('tb_kompetensi_dasar')->insert($kompetensiDasar);

        echo "✅ 3 Kompetensi Dasar data created successfully!\n";
    }
}

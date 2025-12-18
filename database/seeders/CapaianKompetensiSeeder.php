<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid as Generator;

class CapaianKompetensiSeeder extends Seeder
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

        $capaianKompetensi = [
            [
                'uuid' => Generator::uuid4()->toString(),
                'mata_pelajaran_id' => $mataPelajaranIds[0] ?? 1,
                'tipe_capaian' => 'Pengetahuan',
                'kode' => 'CP-MAT-01',
                'deskripsi' => 'Peserta didik mampu memahami dan menerapkan konsep bilangan, aljabar, geometri, dan statistika dalam menyelesaikan masalah kontekstual',
                'ringkasan' => 'Pemahaman konsep matematika dasar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Generator::uuid4()->toString(),
                'mata_pelajaran_id' => $mataPelajaranIds[1] ?? 1,
                'tipe_capaian' => 'Keterampilan',
                'kode' => 'CP-BIN-01',
                'deskripsi' => 'Peserta didik mampu menggunakan bahasa Indonesia dengan baik dan benar dalam berbagai konteks komunikasi, baik lisan maupun tulisan',
                'ringkasan' => 'Keterampilan berbahasa Indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Generator::uuid4()->toString(),
                'mata_pelajaran_id' => $mataPelajaranIds[2] ?? 1,
                'tipe_capaian' => 'Pengetahuan',
                'kode' => 'CP-BIO-01',
                'deskripsi' => 'Peserta didik mampu memahami struktur dan fungsi sistem organ pada makhluk hidup serta keterkaitannya dengan lingkungan',
                'ringkasan' => 'Pemahaman sistem organ makhluk hidup',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('tb_capaian_kompetensi')->insert($capaianKompetensi);

        echo "✅ 3 Capaian Kompetensi data created successfully!\n";
    }
}

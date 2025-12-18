<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get first tenaga kependidikan ID
        $tenagaKependidikanId = DB::table('tb_tenaga_kependidikan')->first()->id ?? null;

        if (!$tenagaKependidikanId) {
            echo "⚠️  No tenaga kependidikan found. Please run UsersSeeder first.\n";
            return;
        }

        // Data contoh - only 3 items as requested
        $mataPelajaran = [
            ['kode' => 'MATH101', 'mata_pelajaran' => 'Matematika'],
            ['kode' => 'BIO102', 'mata_pelajaran' => 'Biologi'],
            ['kode' => 'IND103', 'mata_pelajaran' => 'Bahasa Indonesia'],
        ];

        // Insert data ke dalam tabel
        foreach ($mataPelajaran as $item) {
            DB::table('tb_mata_pelajaran')->insert([
                'uuid' => (string) Str::uuid(),
                'tenaga_kependidikan_id' => $tenagaKependidikanId,
                'kode' => $item['kode'],
                'mata_pelajaran' => $item['mata_pelajaran'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        echo "✅ 3 Mata Pelajaran data created successfully!\n";
    }
}

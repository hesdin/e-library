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
        // Data contoh
        $mataPelajaran = [
            ['kode' => 'MATH101', 'mata_pelajaran' => 'Matematika'],
            ['kode' => 'BIO102', 'mata_pelajaran' => 'Biologi'],
            ['kode' => 'CHE103', 'mata_pelajaran' => 'Kimia'],
            ['kode' => 'PHY104', 'mata_pelajaran' => 'Fisika'],
            ['kode' => 'ENG105', 'mata_pelajaran' => 'Bahasa Inggris'],
        ];

        // Insert data ke dalam tabel
        foreach ($mataPelajaran as $item) {
            DB::table('tb_mata_pelajaran')->insert([
                'uuid' => (string) Str::uuid(),
                'kode' => $item['kode'],
                'mata_pelajaran' => $item['mata_pelajaran'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

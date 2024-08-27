<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_kelas')->insert([
            [
                'uuid' => (string) Str::uuid(),
                'wali_kelas_id' => 1, // Sesuaikan dengan ID wali kelas yang ada
                'kelas' => 'IPA 1',
                'tingkatan' => 'X',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => (string) Str::uuid(),
                'wali_kelas_id' => 1, // Sesuaikan dengan ID wali kelas yang ada
                'kelas' => 'IPA 2',
                'tingkatan' => 'XI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => (string) Str::uuid(),
                'wali_kelas_id' => 1, // Sesuaikan dengan ID wali kelas yang ada
                'kelas' => 'IPA 3',
                'tingkatan' => 'XII',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data contoh lainnya jika diperlukan
        ]);
    }
}

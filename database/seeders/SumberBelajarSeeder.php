<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SumberBelajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data contoh
        $sumberBelajar = [
            [
                'topik_id' => 1, // Ganti dengan ID yang sesuai di tabel tb_topik
                'mata_pelajaran_id' => 1, // Ganti dengan ID yang sesuai di tabel tb_mata_pelajaran
                'judul' => 'Dasar-Dasar Matematika',
                'tingkatan' => 'X',
                'kategori' => 'ebook',
                'youtube_url' => null,
                'file_url' => '/samples/ebook-matematika.pdf',
                'deskripsi' => 'Ebook mengenai dasar-dasar matematika untuk kelas X.',
            ],
            [
                'topik_id' => 2, // Ganti dengan ID yang sesuai di tabel tb_topik
                'mata_pelajaran_id' => 2, // Ganti dengan ID yang sesuai di tabel tb_mata_pelajaran
                'judul' => 'Eksperimen Biologi',
                'tingkatan' => 'XI',
                'kategori' => 'video',
                'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'file_url' => null,
                'deskripsi' => 'Video eksperimen biologi untuk kelas XI.',
            ],
            // Tambahkan lebih banyak data jika diperlukan
        ];

        // Insert data ke dalam tabel
        foreach ($sumberBelajar as $item) {
            DB::table('tb_sumber_belajar')->insert([
                'topik_id' => $item['topik_id'],
                'mata_pelajaran_id' => $item['mata_pelajaran_id'],
                'judul' => $item['judul'],
                'tingkatan' => $item['tingkatan'],
                'kategori' => $item['kategori'],
                'youtube_url' => $item['youtube_url'],
                'file_url' => $item['file_url'],
                'deskripsi' => $item['deskripsi'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

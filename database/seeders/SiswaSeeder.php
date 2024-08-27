<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_siswa')->insert([
            [
                'uuid' => (string) Str::uuid(),
                'kelas_id' => 1, // Sesuaikan dengan ID kelas yang ada
                'nipd' => '123456',
                'nisn' => '0012345678',
                'username' => 'siswa1',
                'password' => bcrypt('password'),
                'nama' => 'Andi Pratama', // Tambahkan nama siswa
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2005-05-15',
                'alamat' => 'Jl. Mawar No. 1',
                'nomor_whatsaap' => '081234567890',
                'nama_wali' => 'Bapak Siswa 1',
                'pekerjaan_wali' => 'PNS',
                'penghasilan_wali' => 5000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => (string) Str::uuid(),
                'kelas_id' => 1, // Sesuaikan dengan ID kelas yang ada
                'nipd' => '654321',
                'nisn' => '0098765432',
                'username' => 'siswa2',
                'password' => bcrypt('password'),
                'nama' => 'Budi Santoso', // Tambahkan nama siswa
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2006-06-20',
                'alamat' => 'Jl. Melati No. 2',
                'nomor_whatsaap' => '081298765432',
                'nama_wali' => 'Ibu Siswa 2',
                'pekerjaan_wali' => 'Wiraswasta',
                'penghasilan_wali' => 7000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data contoh lainnya jika diperlukan
        ]);
    }
}

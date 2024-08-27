<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid as Generator;
use Hash;
use DB;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenagaKependidikan = DB::table('tb_tenaga_kependidikan')->insertGetId([
            'uuid' => Generator::uuid4()->toString(),
            'nip' => '-',
            'nama' => 'admin sekolah',
            'jenis_kelamin' => 'L',
            'tempat_lahir' => 'Makassar',
            'tanggal_lahir' => '2024-05-01',
            'nuptk' => '-',
            'status_kepegawaian' => 'HONORER',
            'jabatan' => 'operator' 
        ]);

        // Insert into tb_produk
        DB::table('users')->insert([
            'uuid' => Generator::uuid4()->toString(),
            'username' => 'admin_sekolah',
            'role' => 'admin',
            'password' => Hash::make('admin'),
            'tenaga_kependidikan_id' => $tenagaKependidikan,
        ]);
    }
}

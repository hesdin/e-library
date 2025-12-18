<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid as Generator;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if admin user already exists
        $existingAdmin = DB::table('users')->where('username', 'admin')->first();

        if ($existingAdmin) {
            echo "ℹ️  Admin user already exists, skipping...\n";
            return;
        }

        // Create Tenaga Kependidikan for Admin
        $tenagaKependidikan = DB::table('tb_tenaga_kependidikan')->insertGetId([
            'uuid' => Generator::uuid4()->toString(),
            'nip' => '-',
            'nama' => 'Administrator',
            'jenis_kelamin' => 'L',
            'tempat_lahir' => 'Makassar',
            'tanggal_lahir' => '1990-01-01',
            'nuptk' => '-',
            'status_kepegawaian' => 'HONORER',
            'jabatan' => 'Administrator',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create Admin User
        DB::table('users')->insert([
            'uuid' => Generator::uuid4()->toString(),
            'username' => 'admin',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
            'tenaga_kependidikan_id' => $tenagaKependidikan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        echo "✅ Admin user created successfully!\n";
        echo "   Username: admin\n";
        echo "   Password: admin123\n";
    }
}

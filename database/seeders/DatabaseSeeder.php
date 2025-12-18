<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Base data - no dependencies
        $this->call(UsersSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(TopikSeeder::class);

        // Depends on Kelas
        $this->call(SiswaSeeder::class);

        // Depends on nothing
        $this->call(MataPelajaranSeeder::class);

        // Depends on MataPelajaran
        $this->call(SumberBelajarSeeder::class);
        $this->call(KompetensiDasarSeeder::class);
        $this->call(CapaianKompetensiSeeder::class);

        // Depends on KompetensiDasar and Kelas
        $this->call(JurnalSeeder::class);

        // Depends on MataPelajaran and Siswa
        $this->call(AbsensiSiswaSeeder::class);

        echo "\n🎉 All seeders completed successfully!\n";
    }
}

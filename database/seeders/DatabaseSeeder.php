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
       $this->call(KelasSeeder::class);
       $this->call(MataPelajaranSeeder::class);
       $this->call(SiswaSeeder::class);
       $this->call(SumberBelajarSeeder::class);
       $this->call(UsersSeeder::class);
    }
}

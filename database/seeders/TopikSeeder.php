<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topiks = [
            [
                'topik' => 'Matematika Dasar',
                'deskripsi' => 'Topik yang membahas konsep dasar matematika seperti operasi bilangan, aljabar, dan geometri',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topik' => 'Bahasa Indonesia',
                'deskripsi' => 'Topik yang membahas tata bahasa, sastra, dan keterampilan berbahasa Indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topik' => 'Sains dan Teknologi',
                'deskripsi' => 'Topik yang membahas ilmu pengetahuan alam dan perkembangan teknologi modern',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('tb_topik')->insert($topiks);

        echo "✅ 3 Topik data created successfully!\n";
    }
}

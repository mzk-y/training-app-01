<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoris = [
            [
                'name' => '食料品',
                'created_at' => now()
            ],
            [
                'name' => '日用品',
                'created_at' => now()
            ],
            [
                'name' => 'その他',
                'created_at' => now()
            ],
        ];

        DB::table('category')->insert($categoris);
    }
}

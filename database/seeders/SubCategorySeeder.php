<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategory_1 = [
            [
                'category_id' => 1,
                'name' => '肉類',
                'created_at' => now()
            ],
            [
                'category_id' => 1,
                'name' => '魚介類',
                'created_at' => now()
            ],
            [
                'category_id' => 1,
                'name' => '野菜類',
                'created_at' => now()
            ],
            [
                'category_id' => 1,
                'name' => '果物類',
                'created_at' => now()
            ],
            [
                'category_id' => 1,
                'name' => '卵・乳製品',
                'created_at' => now()
            ],
            [
                'category_id' => 1,
                'name' => 'スイーツ',
                'created_at' => now()
            ],
            [
                'category_id' => 1,
                'name' => '飲料',
                'created_at' => now()
            ],
        ];

        $subcategory_2 = [
            [
                'category_id' => 2,
                'name' => 'キッチン用品',
                'created_at' => now()
            ],
            [
                'category_id' => 2,
                'name' => '洗濯用品',
                'created_at' => now()
            ],
            [
                'category_id' => 2,
                'name' => '掃除用品',
                'created_at' => now()
            ],
            [
                'category_id' => 2,
                'name' => '収納用品',
                'created_at' => now()
            ],
            [
                'category_id' => 2,
                'name' => '消耗品類',
                'created_at' => now()
            ],
        ];

        DB::table('subcategory')->insert($subcategory_1);
        DB::table('subcategory')->insert($subcategory_2);
    }
}

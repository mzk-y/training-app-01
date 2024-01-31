<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('item_info')->insert([
            'user_id' => 1,
            'shop_name' => 'スーパーA',
            'category_id' => 1,
            'subcategory_id' => 1,
            'item_name' => '鶏もも肉',
            'amount_value' => 100,
            'amount_unit' => 'g',
            'price' => 98,
            'confirm_date' => now()->format('Y-m-d'),
            'memo' => '通常価格',
            'created_at' => now()
        ]);
    }
}

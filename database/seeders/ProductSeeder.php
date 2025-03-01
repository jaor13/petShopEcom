<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'product_name' => 'Grand Plus',
                'category_id' => 2,
                'slug' => 'grand-plus',
                'images' => '["products\/Grandplus.png","products\/Grand2.png"]',
                'description' => 
                '<ul>
                    <li>The Purr Life Cat Litter is made from a special blend of naturally absorbent, plant-based ingredients.</li>
                    <li>Safe for kittens and adult cats.</li>
                    <li>100% biodegradable, earth-friendly, and free from harmful ingredients like clay and silica.</li>
                    <li>Water-soluble, dust-free, and flushable in small volumes.</li>
                    <li>Does not leave paw tracks.</li>
                    <li>Fast clumping & super absorbent (up to 4 weeks supply for one cat).</li>
                    <li>No artificial fragrance.</li>
                </ul>',
                'price' => '123.00',
                'in_stock' => 1,
                'stock_quantity' => 100,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Cat Litter',
                'category_id' => 1,
                'slug' => 'cat-litter-a',
                'images' => '["products\/Cat-Litter-A.png","products\/Cat-Litter-B.png"]',
                'description' => 'fdskfdjkf',
                'price' => '2131.00',
                'in_stock' => 1,
                'stock_quantity' => 100,
                'is_active' => 1,
                'has_variant' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Cat',
                'slug' => 'cat',
                'image' => null,
                'is_active' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'Dog',
                'slug' => 'dog',
                'image' => null,
                'is_active' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'Crates, Kennels & Outdoor',
                'slug' => 'crates-kennels-outdoor',
                'image' => null,
                'is_active' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => 'Dog Toy',
                'slug' => 'dog-toy',
                'image' => null,
                'is_active' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'name' => 'Dry Cat Treats',
                'slug' => 'dry-cat-treats',
                'image' => null,
                'is_active' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'name' => 'Dry Dog Treats',
                'slug' => 'dry-dog-treats',
                'image' => null,
                'is_active' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'name' => 'Dry Food',
                'slug' => 'dry-food',
                'image' => null,
                'is_active' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'name' => 'Hygiene Supplies',
                'slug' => 'hygiene-supplies',
                'image' => null,
                'is_active' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'name' => 'Pet Grooming',
                'slug' => 'pet-grooming',
                'image' => null,
                'is_active' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 10,
                'name' => 'Pet Health & Wellness',
                'slug' => 'pet-health-wellness',
                'image' => null,
                'is_active' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 12,
                'name' => 'Pet Shampoo & Bath Essentials',
                'slug' => 'pet-shampoo-bath-essentials',
                'image' => null,
                'is_active' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 13,
                'name' => 'Pet Snacks',
                'slug' => 'pet-snacks',
                'image' => null,
                'is_active' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 14,
                'name' => 'Pet Supplies',
                'slug' => 'pet-supplies',
                'image' => null,
                'is_active' => 1,
                'created_at' => Carbon::now(),
            ],

            [
                'id' => 15,
                'name' => 'Bird Products',
                'slug' => 'bird-products',
                'image' => null,
                'is_active' => 1,
                'created_at' => Carbon::now(),
            ],

            [
                'id' => 16,
                'name' => 'Fish Feeders',
                'slug' => 'fish-feeders',
                'image' => null,
                'is_active' => 1,
                'created_at' => Carbon::now(),
            ],

            [
                'id' => 17,
                'name' => 'Bearded Dragons',
                'slug' => 'bearded-dragons',
                'image' => null,
                'is_active' => 1,
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
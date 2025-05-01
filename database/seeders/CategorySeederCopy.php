<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeederCopy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('categories')->insert([
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
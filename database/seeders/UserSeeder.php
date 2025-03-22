<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'Admin',
                'fname' => 'Ari',
                'lname' => 'Petshop',
                'email' => 'aripetshop415@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Admin12345'), // Hashing the password
                'role' => 'admin',
                'status' => 'active',
                'cp_num' => null,
                'address_id' => null,
                'profile_picture' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'User1',
                'fname' => 'John',
                'lname' => 'Doe',
                'email' => 'johndoe@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('User12345'), // Hashing the password
                'role' => 'user',
                'status' => 'active',
                'cp_num' => null,
                'address_id' => null,
                'profile_picture' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

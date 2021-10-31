<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mohammed Fahad',
            'email' => 'h4ck3r.x0@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'tax' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

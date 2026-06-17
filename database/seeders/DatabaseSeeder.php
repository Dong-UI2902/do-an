<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Country;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Country::factory(40)->create();

        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Đông',
            'email' => 'dong@example.com',
            'password' => 'nolove1100'
        ]);
    }
}

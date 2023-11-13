<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        for ($i = 0; $i < 10; $i++) {
            User::create([
                "name" => fake()->name,
                "email" => fake()->email,
                "password" => Hash::make("password"),
                "email_verified_at" => now(),
                "image_url" => fake()->imageUrl(150, 150),
            ]);
        }
    }
}

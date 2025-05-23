<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Carousel;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\ActivityFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Usuario de prueba',
            'email' => 'usuariodeprueba@example.com',
            'password' => bcrypt('12345678')
        ]);


        Category::factory(5)->create();

        Post::factory(500)->create(); */

        // Tag::factory(20)->create();

        // Carousel::factory(10)->create();

        Activity::factory(100)->create();
    }
}

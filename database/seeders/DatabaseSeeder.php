<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // * Can overide  a factories models value by passing array of desired values
        $user = \App\Models\User::factory()->create([
            "name" => "Alexander Hoinville",
        ]);

        // * Post factory was buil able to create an associated user and category (check postfactory file)
        \App\Models\Post::factory(3)->create([
            "user_id" => $user->id,
        ]);

        // * Only needed when you don't refresh database at the start
        // \App\Models\User::truncate();
        // \App\Models\Category::truncate();
        // \App\Models\Post::truncate();
    }
}

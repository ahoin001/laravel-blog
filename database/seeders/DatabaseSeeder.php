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
        \App\Models\User::truncate();
        \App\Models\Category::truncate();
        \App\Models\Post::truncate();

        $user = \App\Models\User::factory()->create();

        $personal = \App\Models\Category::create([
            "name" => "Personal",
            "slug" => "personal",
        ]);

        $family = \App\Models\Category::create([
            "name" => "Family",
            "slug" => "family",
        ]);

        $work = \App\Models\Category::create([
            "name" => "Work",
            "slug" => "work",
        ]);

        \App\Models\Post::create([
            "category_id" => $family->id,
            "user_id" => $user->id,
            "title" => "My Family Post",
            "slug" => "my-first-post",
            "excerpt" => "<p>Lorem Ipsum dollar amit</p>",
            "body" =>
                "<p>Lorem ipsum dolor sit amet , morbi viverrra vehicula nisl eget</p>",
        ]);

        \App\Models\Post::create([
            "category_id" => $work->id,
            "user_id" => $user->id,
            "title" => "My Work Post",
            "slug" => "my-work-post",
            "excerpt" => "<p>Lorem Ipsum dollar amit</p>",
            "body" =>
                "<p>Lorem ipsum dolor sit amet , morbi viverrra vehicula nisl eget</p>",
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

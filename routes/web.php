<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function () {
    return view("posts", [
        "posts" => Post::latest("created_at")->get(),
    ]);
});

Route::get("/post", function () {
    $path = __DIR__ . "/../resources/posts/my-first-post.html";

    return view("post", [
        "post" => file_get_contents($path),
    ]);
});

Route::get("/posts/{post}", function ($id) {
    // ? Find post by its slug and pass it to a view called "post"
    return view("post", [
        "post" => Post::findOrFail($id),
    ]);
});

// * Route Model Binding used to let Laravel find the given object by column name provided in wildcard,
// * in this case {category:slug} uses slug column, then laravel using Category type hint will turn the argument into an instance of category that matches slug
Route::get("categories/{category:slug}", function (Category $category) {
    return view("posts", [
        "posts" => $category->posts, // returns all posts assoicated with category
    ]);
});

// ? load() is used instead of with since we already have the model desired.
Route::get("authors/{author:username}", function (User $author) {
    // dd($author);
    return view("posts", [
        "posts" => $author->posts, // returns all posts assoicated with category
    ]);
});

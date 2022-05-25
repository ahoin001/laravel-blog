<?php

use Illuminate\Support\Facades\Route;

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
    return view("posts");
});

Route::get("/post", function () {
    $path = __DIR__ . "/../resources/posts/my-first-post.html";

    return view("post", [
        "post" => file_get_contents($path),
    ]);
});

Route::get("/posts/{post}", function ($post) {
    // * Wildcard will be path to unique blog post
    $path = __DIR__ . "/../resources/posts/{$post}.html";

    // dd($path);

    if (!file_exists($path)) {
        // * Laravel comes with abort and we can return 404
        // abort(404);

        return redirect("/");
    }
    $post = file_get_contents($path);

    return view("post", [
        "post" => $post,
    ]);
})->where("post", "[A-z\-]+"); // * @post is wildcard, Regx To only accept one or letters A-z

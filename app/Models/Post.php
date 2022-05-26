<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class Post
{
    public $title;

    public $excerpt;

    public $date;

    public $body;

    public function __construct($title, $excerpt, $date, $body)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }

    // * Checks Resource directory to see if we have a post with provided post name
    public static function find($postName)
    {
        if (
            !file_exists($path = resource_path("/posts/{$postName}.html")) // * resource path starts at resource dir
        ) {
            // * laravel provided error
            throw new ModelNotFoundException();
        }

        // * ::remember retrieves from cache,
        // * but if requested item doesn't exsist use callback function and add item to cache

        return Cache::remember('posts.{$post}', 5, function () use ($path) {
            // var_dump("file_get_contents");
            return file_get_contents($path);
        });
    }

    // * Returns all posts in post directory
    public static function all()
    {
        $blogFiles = File::files(resource_path("/posts"));

        // ? Iterate array of SplFileInfo objects and use getContents method to get html content from each file in new array
        return array_map(function ($blogFile) {
            return $blogFile->getContents();
        }, $blogFiles);
    }
}

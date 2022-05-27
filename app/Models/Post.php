<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
class Post
{
    public $title;

    public $excerpt;

    public $date;

    public $body;

    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    // * Checks Resource directory to see if we have a post with provided post name
    public static function find($slug)
    {
        //   * Search blog posts for one matching slug
        $posts = static::all();

        return $posts->firstWhere("slug", $slug);
    }

    // * Returns all posts in post directory
    public static function all()
    {
        // return Cache::add("posts.all", "value", 5);

        return cache()->remember("posts.all", 5, function () {
            return collect(File::files(resource_path("posts")))
                ->map(function ($file) {
                    // extract yamlmatter into object from post file
                    $document = YamlFrontMatter::parse(
                        file_get_contents($file)
                    );

                    // return to new array of Posts using Pst class with yaml data
                    return new Post(
                        $document->matter("title"),
                        $document->matter("excerpt"),
                        $document->matter("date"),
                        $document->body(),
                        $document->matter("slug")
                    );
                })
                ->sortByDesc("date"); // * Helpful collection method
        });
    }
}

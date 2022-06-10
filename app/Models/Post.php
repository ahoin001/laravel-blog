<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // * Everything can be mass assigned except provided attribute name
    protected $guarded = [];

    // * Specified attributes can be mass assigned
    // protected $fillable = ["title", "excerpt", "body"];

    // ? $with property added here will make every Post query WITH the listed related tables by default
    // ? by using the methods created below
    protected $with = ["category", "author"];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // ?M Method names matter. Laravel looks for foreign key author_id. If it was foo, foo_id
    public function author()
    {
        // * Since we chose our own method name for readability, we have to use
        // * 2nd argument to specify what foreign key to use
        return $this->belongsTo(User::class, "user_id");
    }
}

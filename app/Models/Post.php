<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // * Everything can be mass assigned except provided attribute name
    protected $guarded = [];

    // * Can be mass assigned
    // protected $fillable = ["title", "excerpt", "body"];

    public function category()
    {
        // ? These function names matter. Laravel will look for foreign key user_id. If it was foo, foo_id
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the user that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}

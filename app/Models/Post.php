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
        return $this->belongsTo(Category::class);
    }
}

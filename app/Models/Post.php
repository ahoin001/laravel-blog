<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // * Everything can be mass assigned except provided column name
    protected $guarded = ["id"];

    // * Can be mass assigned
    // protected $fillable = ["title", "excerpt", "body"];
}

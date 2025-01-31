<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function postcategories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }
}

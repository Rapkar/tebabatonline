<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function subcategory()
    {
        return $this->hasMany(\App\Models\Category::class, 'order');
    }

    public function parent()
    {
        return $this->belongsTo(\App\Models\Category::class, 'order');
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function categorizable()
    {
        return $this->morphTo();
    }
}

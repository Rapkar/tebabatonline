<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function carts(){
        return $this->belongsToMany(Cart::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;
    protected $fillable = [
        'id',
        'quantity'
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function productcategories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }
    public function incrementQuantity($amount = 1)
    {
        $this->increment('quantity', $amount);
    }

    public function decrementQuantity($amount = 1)
    {
        $this->decrement('quantity', $amount);
    }

    public function updateQuantity($newQuantity)
    {   if ($this->cart()->exists()) {
        $this->cart()->update(['quantity' => $newQuantity]);
    }
    }
    public function recommendation(){
        return $this->belongsToMany(Recommendation::class,'recommendation_product');
    }
    public function isInStock()
    {
        return $this->quantity > 0;
    }
    public function carts(){
        return $this->belongsToMany(Cart::class)->withPivot( 'quantity');
    }
  
}

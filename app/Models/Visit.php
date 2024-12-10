<?php

namespace App\Models;

use Illuminate\database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Visit extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class,'visit_product')->withPivot('count','id','visit_id','product_id');
    }
    public function recommendations(){
        return $this->belongsToMany(Recommendation::class,'visit_recommendation');
    }
    public function descibtions(){
        return $this->belongsToMany(Describtion::class,'visit_describtion');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    protected $fillable = [
        'content'
    ];
    public function describtions(){
        return $this->belongsToMany(Describtion::class,'describtion_recommendation');
    }
    public function product(){
        return $this->belongsToMany(Product::class,'recommendation_product')->withPivot('recommendation_id');
    }
    public function visitdescribtions(){
        return $this->belongsToMany(Describtion::class,'visit_describtion')->withPivot('recommendation_id');
    }

}

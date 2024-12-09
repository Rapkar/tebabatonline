<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Recommendation;
class Describtion extends Model
{
    public function recommendation(){
        return $this->belongsTo(Recommendation::class);
    }
}

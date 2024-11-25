<?php

namespace App\Http\Controllers\MedicPanel;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitControllr extends Controller
{
 
    public function visits()  {
        
        $title = __("medic.Medic Page");
        $items=Visit::all();
        // dd($items);
 
    
        return view('medic_panel.home',compact('title','items'));

    }
}

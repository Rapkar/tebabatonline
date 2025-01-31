<?php

namespace App\Http\Controllers\MedicPanel;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class VisitControllr extends Controller
{
 
    public function visits()  {
        
        $title = __("medic.Medic Page");
        $items=Visit::all();
        // dd($items);
 
    
        return view('medic_panel.home',compact('title','items'));

    }
    public function completevisit(Request $request){
        $visit_id=$request->input('visit_id');
        $item=Visit::find($visit_id);
        if ($item) {
            $item->completed = 1; // Mark as completed
            // $item->medic_id=Auth::user()->id;
            $item->save();
        }
        return redirect()->back()->with('success','نسخه ارسال شد');
    }
    public function uncompletevisit(Request $request){
        $visit_id=$request->input('visit_id');
        $item=Visit::find($visit_id);
        if ($item) {
            $item->completed = 0; // Mark as completed
            $item->save();
        }
        return redirect()->back()->with('success','نسخه ارسال شد');
    }
}

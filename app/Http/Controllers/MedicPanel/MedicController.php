<?php

namespace App\Http\Controllers\MedicPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visit;
use Hekmatinasser\Verta\Verta;
class MedicController extends Controller
{
    public function index(){
        $title = __("medic.Medic Page");
        $items=Visit::all();
        // dd($items);
        $result=[];
        foreach ($items as $item) {
            // dd($item->content);
            $j_date = verta($item->created_at);
            $formattedDate = $j_date->format('Y/m/d H:i:s');
            // or
            $formattedDate = $j_date->formatJalaliDateTime();
            $result[] = ['data' => json_decode($item->content), 'date' => $formattedDate,'original'=>$item];
        }

    
        return view('medic_panel.home',compact('title','result'));

    }

}

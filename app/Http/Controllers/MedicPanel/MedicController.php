<?php

namespace App\Http\Controllers\MedicPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visit;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Auth;
use App\Models\Recommendation;
class MedicController extends Controller
{
    public function __construct()
    {

        $medicinerecomendation = Recommendation::where('type', 'medicinerecomendation')->get();
        $recomendation = Recommendation::where('type', 'recomendation')->get();
        $problems = Recommendation::where('type', 'problems')->get();
        $Recommendations = Recommendation::All();
 
        
        view()->share([
            'medicinerecomendation' =>  $medicinerecomendation,
            'recomendation' => $recomendation,
            'problems' => $problems,
            'Recommendations' => $Recommendations,
        
        ]);
    
    }
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
        $notifications = Auth::user()->notifications()->whereNull('read_at')->get();
        return view('medic_panel.home',compact('notifications','title','result','notifications'));

    }

}

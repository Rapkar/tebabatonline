<?php

namespace App\Http\Controllers\MedicPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Describtion;
use App\Models\Recommendation;
use App\Models\Visit;

class DescribtionController extends Controller
{
    public function store(Request $request, $id)
    {
        $data = $request->all();
        $describtion =  new Describtion;
        $describtion->content = $request->input('content');
        $describtion->save();
        $Recommendation = Recommendation::find($id);
        $Recommendation->describtions()->attach($describtion);
        // $describtion->recommendation()->attach($Recommendation);
        return redirect()->route('recommendation', $Recommendation->type);
    }
    public function getdescribtions(Request $request)
    {
        // $item=$request;
        $id = $request->recommendation_id;
        $Recommendation = Recommendation::find($id);
        $describtion = $Recommendation->describtions;
        return  json_encode($describtion);
    }
    public function setdescribtions(Request $request)
    {
        
        $recommendation_id = $request->recommendation_id;
        $visit_id = $request->visit_id;
        $visit = Visit::find($visit_id);
        $exists = $visit->recommendations()->where('recommendation_id', $recommendation_id)->exists();
        if (!$exists && is_array($request->Recommendationsdes)) {
            $Recommendationsdes = $request->Recommendationsdes;
            $visit->recommendations()->attach($recommendation_id);
            foreach ($Recommendationsdes as $item) {
                $visit->descibtions()->attach($item);
            }

            $recommendations=$visit->recommendations()->where('type', 'recomendation')->get();
            $res = view('medic_panel.patient.part.recommendation', compact('recommendations','visit_id'))->render();
            return response()->json(['message' => 'success','data'=>$res], 200);
        } else {
            return response()->json(['message' => 'duplicated or choice a describe'], 409);
        }
        // return $Recommendationsdes;
    }
    public function invisitrmdrecom(Request $request)
    {
        $visit_id = $request->visit_id;
        $recommendation_id = $request->recommendation_id;
        $visit = Visit::find($visit_id);
        $visit->recommendations()->detach($recommendation_id);
        return redirect()->route('patient_examination', $visit_id);
    }
}

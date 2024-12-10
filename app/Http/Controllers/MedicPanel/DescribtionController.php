<?php

namespace App\Http\Controllers\MedicPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Describtion;
use App\Models\Recommendation;

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
    public function getdescribtions(Request $request){
        // $item=$request;
        $id=$request->recommendation_id;
        $Recommendation = Recommendation::find($id);
        $describtion=$Recommendation->describtions;
        return  json_encode($describtion);
    }
}

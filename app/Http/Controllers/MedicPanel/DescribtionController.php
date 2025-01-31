<?php

namespace App\Http\Controllers\MedicPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Describtion;
use App\Models\Product;
use App\Models\Recommendation;
use App\Models\Visit;

class DescribtionController extends Controller
{


    public function store(Request $request, $id)
    {
        $data = $request->all();
        // create the new  Describtion
        $describtion =  new Describtion;
        $describtion->content = $request->input('content');
        $describtion->save();

        // get the Recommendation objet from Id 
        $Recommendation = Recommendation::find($id);

        // Attch Describtion to Recommendation
        $Recommendation->describtions()->attach($describtion);

        return redirect()->route('recommendation', $Recommendation->type);
    }



    // Get Describtion of Recommendation Ajax
    public function getdescribtions(Request $request)
    {
        // $item=$request;
        $id = $request->recommendation_id;
        $Recommendation = Recommendation::find($id);
        $describtion = $Recommendation->describtions;
        return  json_encode($describtion);
    }

    // Get Recommendation of products Ajax
    public function getrecommendationproduct(Request $request)
    {
        $visit_id = $request->visit_id;
        $productid = $request->product_id;
        $product = Product::find($productid);

        return $product->recommendation;
    }


    // Set Describtions of Recommendation for Visit Model
    public function setdescribtions(Request $request)
    {
        //Assign Ids From post Request
        $recommendation_id = $request->recommendation_id;
        $visit_id = $request->visit_id;

        // Get the Vist object from id
        $visit = Visit::find($visit_id);

        // Check Visti recommendations Exist
        $exists = $visit->recommendations()->where('recommendation_id', $recommendation_id)->exists();

        if (!$exists && is_array($request->Recommendationsdes)) {

            //Assign Describtinos to variable
            $Recommendationsdes = $request->Recommendationsdes;

            //Attach Describtinos to recommendations relate table
            $visit->recommendations()->attach($recommendation_id, ['comment' => $request->comment]);

            //Attach Describtinos to visit relate table
            foreach ($Recommendationsdes as $item) {
                $visit->describtions()->attach($item, ['recommendation_id' => $recommendation_id]);
            }

            // Get the Recommendation object from id
            $type = Recommendation::find($request->recommendation_id);


            //Assign type
            $type = $type->type;

            //Get Recommendations object byr type
            $recommendations = $visit->recommendations()->where('type', $type)->get();

            // render html dom for pass to js in client side 
            $res = view('medic_panel.patient.part.recommendation', compact('recommendations', 'visit_id'))->render();
            return response()->json(['message' => 'success', 'data' => $res], 200);
        } else {
            return response()->json(['message' => 'duplicated or choice a describe'], 409);
        }
        // return $Recommendationsdes;
    }


    // Remove Recommendation items From Visit page
    public function invisitrmdrecom(Request $request)
    {
        // Assign Variable 
        $visit_id = $request->visit_id;
        $recommendation_id = $request->recommendation_id;

        // Get Objct Of Vist by id
        $visit = Visit::find($visit_id);

        // detach recommendation of visit
        $visit->recommendations()->detach($recommendation_id);
        // $visit->describtions()->detach($recommendation_id);
        if (is_array($request->describtion_id)) {
            foreach ($request->describtion_id  as $item) {
                $visit->describtions()->detach($item);
            }
        }
        return redirect()->route('patient_examination', $visit_id);
    }


    // Delete The Describtions of Recommendation
    public function destroy($id)
    {
        Describtion::find($id)->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\MedicPanel;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Visit;
use Hekmatinasser\Verta\Verta;
use  App\Models\Recommendation;
use App\Http\Controllers\MedicPanel\Helper\MedicHelper;
class PatientController extends Controller
{
    
    use MedicHelper;
    
    public function patient_examination($id)
    {
        // dd($id);
        $title = __("medic.Medic Page");
        $items = Visit::find($id);
        $selected_products = $items->products()->get();
        $selected_recommendations = $items->recommendations()->get();
        $selected_descibtions = $items->descibtions()->get();
        $result = [];
        $j_date = verta($items->created_at);
        $formattedDate = $j_date->format('Y/m/d H:i:s');
        $formattedDate = $j_date->formatJalaliDateTime();
        $result[] = ['data' => json_decode($items->content), 'date' => $formattedDate, 'id' => $items->id];
        $visit_id=$items->id;
        $products = Product::all();
        $Recommendations = [];
        $Recommendations = Recommendation::All();

        $recomendation = Recommendation::where('type', 'recomendation')->get();
        $problems = Recommendation::where('type', 'problems')->get();
        $medicinerecomendation = Recommendation::where('type', 'medicinerecomendation')->get();

        return view('medic_panel.patient.patient', compact('title','visit_id','problems','recomendation','medicinerecomendation', 'result', 'products', 'selected_products', 'Recommendations', 'selected_recommendations', 'selected_descibtions'));
    }
    public function Totlaprice($relatedproducta)
    {
        $total = collect($relatedproducta)->sum(function ($item) {
            return $item->price * $item->pivot->count;
        });
        return $total;
    }
    public function addproducttopatient(Request $request)
    {
        $visit_id = $request->input('visit_id');
        $product_id = $request->input('product_id');
        $count = $request->input('count');
        $product = Product::all()->find($product_id); //find the product
        $visit = Visit::all()->find($visit_id); //find the visit
        // $items = Visit::find($id);

        if ($visit->products()->where('product_id', $product_id)->exists()) {
            return response()->json(['error' => 'Product already added to this visit'], 400);
        }

        $visit->products()->attach($product, ['count' => $count]);
        $selected_products = $visit->products()->get();
        $mesage = view('medic_panel.patient.part.product', compact('selected_products'))->render();
        $totalprice = $this->Totlaprice($selected_products);
        return response()->json(['success' => 'Product added to patient visit successfully', 'data' => $mesage, 'total' => $totalprice]);

        // return $visit;
    }
    public function removeProductFromPatient(Request $request, $visit_id, $product_id)
    {
        // Find the visit by its ID
        $visit = Visit::find($visit_id);

        // Check if the visit exists
        if (!$visit) {
            return response()->json(['error' => 'Visit not found'], 404);
        }

        // Detach the product from the visit
        $visit->products()->detach($product_id);

        return  redirect()->route('patient_examination', $visit_id);
    }
}

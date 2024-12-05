<?php

namespace App\Http\Controllers\MedicPanel;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Visit;
use Hekmatinasser\Verta\Verta;

class PatientController extends Controller
{
 
    public function patient_examination($id)
    {
        // dd($id);
        $title = __("medic.Medic Page");
        $items = Visit::find($id);
        $selected_products = $items->products()->get();
        // dd($selected_products);
        // dd( $selected_products);
        //  dd($items->created_at);
        $result = [];

        // dd($item->content);
        $j_date = verta($items->created_at);
        $formattedDate = $j_date->format('Y/m/d H:i:s');
        // or
        $formattedDate = $j_date->formatJalaliDateTime();
        $result[] = ['data' => json_decode($items->content), 'date' => $formattedDate, 'id' => $items->id];
        // dd($result);
        $products = Product::all();
       
        return view('medic_panel.patient.patient', compact('title', 'result', 'products','selected_products'));
    }
    public function addproducttopatient(Request $request)
    {
        $visit_id = $request->input('visit_id');
        $product_id = $request->input('product_id');
        $count = $request->input('count');
        $product = Product::all()->find($product_id); //find the product
        $visit = Visit::all()->find($visit_id); //find the visit


        return $visit->products()->attach($product,['count' => $count]);
        // return $visit;
    }
}

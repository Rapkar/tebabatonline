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
        //  dd($items->created_at);
        $result = [];

        // dd($item->content);
        $j_date = verta($items->created_at);
        $formattedDate = $j_date->format('Y/m/d H:i:s');
        // or
        $formattedDate = $j_date->formatJalaliDateTime();
        $result[] = ['data' => json_decode($items->content), 'date' => $formattedDate];
        // dd($result);
        $products = Product::all();

        return view('medic_panel.patient.patient', compact('title', 'result', 'products'));
    }
}

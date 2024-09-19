<?php

namespace App\Http\Controllers\MedicPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicController extends Controller
{
    public function index(){
        $title = __("medic.Medic Page");
        return view('medic_panel.home',compact('title'));

    }
}

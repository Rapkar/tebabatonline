<?php

namespace App\Http\Controllers\MedicPanel;

use App\Http\Controllers\Controller;
use App\Models\Recommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RecomendationController extends Controller
{
    protected function validator($request)
    {
        $data = $request->all();
        return Validator::make($data, [
            'content' => ['required', 'string'],
        ], [
            'name.required' => __("admin.The name field is required."),
            'name.string' => __('admin.The name must be a string.'),
        ]);
    }
    public function index()
    {
        $result = Recommendation::all();
        return view('medic_panel.patient.recomendation.index', compact('result'));
    }
    public function create()
    {
        $result = Recommendation::all();
        $title = "توصیه ها";
        return view('medic_panel.patient.recomendation.create', compact('title', 'result'));
    }
    public function store(Request $request)
    {
        $Recommendation = new Recommendation;
        $this->validator($request, [
            'content' => ['required'] // Corrected 'requred' to 'required'
        ]);
        $Recommendation->content = $request->input('content');
        $Recommendation->save();
        $result = Recommendation::all();
        return view('medic_panel.patient.recomendation.index', compact('result'));
    }
    public function show($id) {}
    public function edit($id) {}
    public function update(Request $request, $id) {}
    public function destroy($id)
    {
        $Recommendation = Recommendation::find($id);
        $Recommendation->delete();
        return redirect()->route('recommendation');
    }
}

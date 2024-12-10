<?php

namespace App\Http\Controllers\MedicPanel;

use App\Http\Controllers\Controller;
use App\Models\Describtion;
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
    protected function validateType($type)
    {
        $title = '';
        switch ($type) {
            case 'recomendation':
                $type = 'recomendation';
                $title = "توصیه ها";
                break;
            case 'problems':
                $type = 'problems';
                $title = "مشکلات";
                break;
            case 'medicinerecomendation':
                $type = 'medicinerecomendation';
                $title = "توصیه های دارویی";
                break;
            default:
                $type = 'recomendation';
                break;
        }
        return ['type' => $type, 'title' => $title];
    }
    public function index($type)
    {

        $result = Recommendation::where('type', $type)->get();
        return view('medic_panel.patient.recomendation.index', compact('result'));
    }
    public function create($type)
    {
        $title = $this->validateType($type)['title'];
        $type = $this->validateType($type)['type'];
        $result = Recommendation::where('type', $type)->get();

        return view('medic_panel.patient.recomendation.create', compact('title', 'result', 'type'));
    }
    public function store(Request $request)
    {
        $Recommendation = new Recommendation;
        $this->validator($request, [
            'content' => ['required'] // Corrected 'requred' to 'required'
        ]);
        $type = $request->input('type');
        $Recommendation->content = $request->input('content');
        $Recommendation->type =   $type;
        $Recommendation->save();
        $result = Recommendation::where('type', $type)->get();
        return redirect()->route('recommendation');
    }
    public function show($id) {}
    public function edit($id)
    {

        $Recommendation = Recommendation::find($id);
        $describtions = [];
        $describtions = $Recommendation->describtions;
        // dd( $Recommendation, $describtions);
        // $Recommendation->delete();
        return view('medic_panel.patient.recomendation.edit', compact('describtions', 'Recommendation'));
    }
    public function update(Request $request, $id)
    {
        $Recommendation = Recommendation::find($id);
        $Recommendation->content = $request->input('content');
        $Recommendation->save();
        return redirect()->route('recommendation', $Recommendation->type);
    }
    public function destroy($id)
    {
        $Recommendation = Recommendation::find($id);
        $Recommendation->delete();
        return redirect()->route('recommendation');
    }
}

<?php

namespace App\Http\Controllers\MedicPanel;

use App\Http\Controllers\Controller;
use App\Models\Describtion;
use App\Models\Recommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\MedicPanel\Helper\MedicHelper;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class RecomendationController extends Controller
{

    use MedicHelper;
    public function __construct()
    {

        $medicinerecomendation = Recommendation::where('type', 'medicinerecomendation')->get();
        $recomendation = Recommendation::where('type', 'recomendation')->get();
        $problems = Recommendation::where('type', 'problems')->get();
        $Recommendations = Recommendation::All();

        if (Auth::check()) {
            $notifications = Auth::user()->notifications()->whereNull('read_at')->get();
        }else{
            $notifications=[];
        }
        view()->share([
            'medicinerecomendation' =>  $medicinerecomendation,
            'recomendation' => $recomendation,
            'problems' => $problems,
            'Recommendations' => $Recommendations,
            'notifications'=>$notifications 
        ]);
    }
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
        $products = Product::all();

        return view('medic_panel.patient.recomendation.create', compact('title', 'result', 'type', 'products'));
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
        if ($type == "medicinerecomendation") {
            $product = Product::find($request->input('product'));
            $Recommendation->product_id =$product->id;
            // $Recommendation->product()->attach($product);
            // dd($product->id);
            // $Recommendation= $Recommendation->product;
            // dd($Recommendation->product);
            $Recommendation->product()->attach($product); 
            $Recommendation->save();
        }
        $result = Recommendation::where('type', $type)->get();
        return redirect()->route('recommendation', $type);
    }
    public function show($id) {}
    public function edit($id)
    {

        $Recommendation = Recommendation::find($id);
        $describtions = [];
        $describtions = $Recommendation->describtions;
        // dd( $Recommendation, $describtions);
        // $Recommendation->delete();
        $products = Product::all();
        $product_id=null;
        
            $product_id = $Recommendation->product->first()->id ?? null;
        
         
      
        return view('medic_panel.patient.recomendation.edit', compact('describtions', 'product_id', 'products', 'Recommendation'));
    }
    public function update(Request $request, $id)
    {
        $Recommendation = Recommendation::find($id);
        $Recommendation->content = $request->input('content');
        $Recommendation->product_id = $request->input('product');
        $Recommendation->save();
        return redirect()->route('recommendation', $Recommendation->type);
    }
    public function destroy($id)
    {


        $Recommendation = Recommendation::find($id);

        $Recommendation->delete();
        return redirect()->back()->with('success','با موفقیت حذف شد');
    }
}

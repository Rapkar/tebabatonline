<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\BotController;
use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Validator;

class OptionController extends Controller
{
    public $logoimg;
    public function __construct()
    {
        $this->logoimg = Option::where('key', '=', 'logoimg')->value('value');
        view()->share([
            'logourl' =>  $this->logoimg
        ]);
    }
    protected function validator($request)
    {
        $data = $request->all();
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'logoimg' => ['required', 'string', 'max:255'],
        ], [
            'title.required' => __("admin.The title field is required."),
            'title.string' => __('admin.The title must be a string.'),
            'title.max' => __('admin.The title must not be greater than :max characters.'),
            'logoimg.required' => __('admin.The image field is required.'),

        ]);
    }
    public function index()
    {
        $title = __("admin.Options Login Page");
        $options = Option::pluck('value', 'key')->toArray();
        $BotController = new BotController;
        $robotcontent = $BotController->index();
        return  view('admin_panel.options.index', compact(['title', 'options', 'robotcontent']));
    }
    protected function options()
    {
        $options = ['title', 'logoimg', 'showSecurityQuestion', 'showMaintenanceMode'];
        return $options;
    }
    public function store(Request $request)
    {
        $validator = $this->validator($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        foreach ($this->options() as $key => $option) {
            $existingOption = Option::where('key', $option)->first();
            if ($existingOption) {
                $existingOption->value =  $request->input($option) ?? 'off';
                $existingOption->update();
            } else {
                $newOption = new Option;
                $newOption->key = $option;
                $newOption->value = $request->input($option) ?? 'off';
                $newOption->save();
            }
        }
        return redirect()->route('options.login')->with('sucess', 'added');
    }
}

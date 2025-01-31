<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;
class FileManagerController extends Controller
{
    public $logoimg;
    public function __construct()
    {
        $this->logoimg = Option::where('key', '=', 'logoimg')->value('value');
        view()->share([
            'logourl' =>  $this->logoimg
        ]);
    }
    public function index(){
        $title = __("admin.Categories Page");
        
        return  view('admin_panel.filemanager.index', compact(['title']));

    }
}

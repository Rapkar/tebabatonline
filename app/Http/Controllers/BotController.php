<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BotController extends Controller
{
    public function index()
    {
        $filePath = public_path('robots.txt');
        $file = File::get($filePath);
        return $file;

    }
    public function update(Request $request)
    {
        $content= $request->input('robot');
        $filePath = public_path('robots.txt');
        $file = File::put($filePath, $content);
     return redirect()->back()->with("succcess",'ثبت شد');

    }
}

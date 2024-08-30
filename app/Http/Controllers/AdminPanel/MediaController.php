<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function uploadfile(Request $request)
    {
        $file=$request->file('file');
        $imageName= time().' '.$file->getClientOriginalName();
        $url=$request->file('file')->storeAs('images', $imageName);
        sleep(1);
        return $url;
    }
}

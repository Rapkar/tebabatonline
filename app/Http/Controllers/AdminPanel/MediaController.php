<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function uploadfile(Request $request)
    {
        //  dd($request);
        // dd($request->file('file'));
        if($request->file('file') != null){
            $file=$request->file('file');
        }else{
            $file=$request->file('image');
        }
        $imageName= time().' '.$file->getClientOriginalName();
        $url=$request->file('file')->storeAs('images', $imageName);
        sleep(1);
        return response()->json([
            'success' => true,
            'location' =>  asset('storage/uploads/' . $url),// Use asset() to return a full URL
            'data' =>$request // Use asset() to return a full URL
        ]);
    }
}

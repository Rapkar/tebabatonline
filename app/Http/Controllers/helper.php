<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class helper extends Controller
{
    public function getState()
    {
        $path = public_path('inc/state.json');

        if (File::exists($path)) {
            $states = File::get($path);
            return json_decode($states);
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }
    public function getCityByState($state)
    {
        $path = public_path('inc/city.json');
        if (File::exists($path)) {
            $cities = File::get($path);
        }

        // $cities=file_get_contents(asset('inc/city.json'));
        $cities = json_decode($cities);
        $res = [];
        foreach ($cities as $city) {
            if ($city->province_id == $state) {
                $res[] = $city;
            }  
        }
        if (count($res) > 1) {
            return  $res;
        } else {
            return 'Not found!';
        }
    }
}

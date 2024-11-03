<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Controllers\helper as ControllersHelper;
use App\Http\Controllers\helper;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function getcitybystate(Request $request)
    {
        $helper = new helper;
        $state = $request->input('state_id');
        $state=intval($state);
        $res=$helper->getCityByState($state);

        return  $res;
    }
}

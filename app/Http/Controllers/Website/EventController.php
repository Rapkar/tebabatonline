<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Controllers\helper as ControllersHelper;
use App\Http\Controllers\helper;
use App\Models\Notification;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function getcitybystate(Request $request)
    {
        $helper = new helper;
        $state = $request->input('state_id');
        $state = intval($state);
        $res = $helper->getCityByState($state);

        return  $res;
    }
    public function index(Request $request)
    {
        $title = __("Events");
        return view('admin_panel.Options.Notifications', compact('title'));
    }
    public function store(Request $request){
   
        $this->validate($request, [
            'message'=> 'required',
            'user_id'=> 'required | numberic ',
        ]);
        $Notif=new Notification();
        $Notif->data= $request->input('message');
        $Notif->data= $request->input('message');
    }
}

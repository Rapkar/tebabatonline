<?php

namespace App\Http\Controllers;

use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->roles()->find(Auth::id());
        $title = __("admin.Home Page");
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('adminDashboard');
        } else if (Auth::user()->hasRole('medic')) {
            return redirect()->route('medicDashboard');
        } else if (Auth::user()->hasRole('user') || Auth::user()->hasRole('admin')) {
            return redirect()->route('userDashboard');
        } else {
            return redirect()->route('home');
        }
    }
}

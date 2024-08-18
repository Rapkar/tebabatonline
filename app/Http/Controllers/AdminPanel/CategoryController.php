<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
        $categories = Category::all();
        return view('admin_panel.categories.create-category', compact('categories'));
    }
    public function store(Request $request)
    {
        $validator = $this->validator($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // S
        $user = new Category();
        $user->name = $request->input('name');
        $user->content = $request->input('content');
        $user->order = $request->input('order');
        $user->save();


        // $role = Role::find($request->input('role'));
        // $user = User::find($user->id);
        // $role->users()->attach($user->id);
        return redirect()->route('postcats'); // redirect to the users index page
    }
}

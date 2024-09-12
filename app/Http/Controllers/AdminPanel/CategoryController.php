<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // $users = User::all();
        $categories = Category::all();
        $title=__("admin.Categories Page");
        // $users = User::whereHas('roles', function ($query) {
        //     $query->where('name', 'admin');
        // })->get();
        return view('admin_panel.categories.list-category', compact( 'categories','title'));
    }
    public function create(Request $request)
    {
        $title=__("admin.Create Categories Page");
        $categories = Category::all();
        return view('admin_panel.categories.create-category', compact('categories','title'));
    }
    public function store(Request $request)
    {

        // S
        $Category = new Category();
        $Category->name = $request->input('name');
        $Category->content = $request->input('content');
        $Category->order = $request->input('order');
        $Category->save();


        // $role = Role::find($request->input('role'));
        // $user = User::find($user->id);
        // $role->users()->attach($user->id);
        return redirect()->route('postcats'); // redirect to the users index page
    }
    public function delete($id)
    {
        $Category = Category::find($id);
        if ($Category) {
            $Category->delete();
            return redirect()->route('postcats');
        } else {
            // handle error
        }
    }
}

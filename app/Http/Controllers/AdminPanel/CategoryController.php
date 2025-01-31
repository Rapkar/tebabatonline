<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Option;
class CategoryController extends Controller
{
    public $logoimg;
    public function __construct()
    {
        $this->logoimg = Option::where('key', '=', 'logoimg')->value('value');
        view()->share([
            'logourl' =>  $this->logoimg
        ]);
    }
    public function index($type)
    {
        // dd($type);
        // $category = Category::with('posts')->get();
        $categories = Category::with($type)->where('type', $type)->get();
        // dd($categories);
        $title = __("admin.Categories Page");
        return view('admin_panel.categories.list-category', compact('categories', 'title'));
    }
    public function create($type)
    {
        $title = __("admin.Create Categories Page");
        $categories = Category::with($type)->where('type', $type)->get();
        return view('admin_panel.categories.create-category', compact('categories', 'title', 'type'));
    }
    public function store(Request $request, $type)
    {

        // S
        $Category = new Category();
        $Category->name = $request->input('name');
        $Category->Label = $request->input('label');
        $Category->content = $request->input('content');
        $Category->type = $type;
        $Category->order = $request->input('order');
        $Category->save();


        // $role = Role::find($request->input('role'));
        // $user = User::find($user->id);
        // $role->users()->attach($user->id);
        return redirect()->route($type . 'cats', $type); // redirect to the users index page
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

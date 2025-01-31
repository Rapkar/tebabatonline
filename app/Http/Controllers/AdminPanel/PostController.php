<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Option;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public $logoimg;
    public function __construct()
    {
        $this->logoimg = Option::where('key', '=', 'logoimg')->value('value');
        view()->share([
            'logourl' =>  $this->logoimg
        ]);
    }

    protected function validator($request)
    {
        $data = $request->all();
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'image' => ['required ', 'string', 'max:255'],
        ], [
            'name.required' => __("admin.The name field is required."),
            'name.string' => __('admin.The name must be a string.'),
            'name.max' => __('admin.The name must not be greater than :max characters.'),
            'name.unique' => __('admin.The name has already been taken.'),
            'slug.required' => __('admin.The slug field is required.'),
            'slug.string' => __('admin.The slug must be a string.'),
            'slug.max' => __('admin.The slug must not be greater than :max characters.'),
            'slug.unique' => __('admin.The slug has already been taken.'),
            'image.required' => __("admin.The image field is required."),
            'image.string' => __("admin.The image must be a string."),
            'image.max' => __("admin.The image must not be greater than :max characters."),
        ]);
    }
    public function index(Request $request)
    {
        // $url = 'filemanager';
        // $route = app('router')->getRoutes()->match(app('request')->create($url));
        // $routeName = $route->getName();
        // dd($routeName);
        $title = __("admin.Post Page");
        $posts = Post::where('user_id', auth()->id())->take(10)->get();
        $items = Post::paginate(10);
        return view('admin_panel.posts.list-post', compact('posts', 'title', 'items'));
    }
    public function create(Request $request)
    {
        $title = __("admin.Create Post Page");
        $categories = Category::where('type', '=', 'posts')->get();
        return view('admin_panel.posts.create-post', compact('categories', 'title'));
    }
    public function store(Request $request)
    {
        $validator = $this->validator($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // S
        $Post = new Post();
        $Post->name = $request->input('name');
        $Post->content = $request->input('content');
        $Post->expert = $request->input('expert');
        $Slug = $request->input('slug');
        $Post->slug = str_replace(" ", "_", $Slug);
        $Post->image = $request->input('image');
        $Post->status = $request->input('status');
        $Post->user_id = Auth::user()->id;
        $Post->save();
        if ($request->input('category')) {
            $categories = $request->input('category');
            $Post = Post::find($Post->id);
            foreach ($categories as $category) {
                $category = Category::find($category);
                $Post->categories()->attach($category->id);
            }
        }


        return redirect()->route('posts'); // redirect to the users index page
    }
    public function delete($id)
    {
        $Post = Post::find($id);
        if ($Post) {
            $Post->delete();
            return redirect()->route('posts');
        } else {
            // handle error
        }
    }
    public function edit($id)
    {
        $post = Post::all()->find($id);
        $categories = Category::where('type', '=', 'posts')->get();
        $cats = $post->categories()->get();
        $ids = [];
        foreach ($cats as $cat) {
            $ids[] = $cat->id;
        }

        $title = __("admin.Edit Post Page");
        return view('admin_panel.posts.edit-post', compact('post', 'categories', 'ids', 'title'));
    }
    public function update(Request $request, $id)
    {
        $Post = Post::find($id);

        $Post->name = $request->input('name');
        $Post->content = $request->input('content');
        $Post->expert = $request->input('expert');
        $Post->slug = $request->input('slug');
        $Post->image = $request->input('image');


        // $Post->image =$url;
        $Post->status = $request->input('status');

        #  $user->address = $request->input('address');
        if ($request->input('category')) {
            $categories = $request->input('category');

            // Detach all current categories
            $Post->categories()->detach();

            // Attach new categories
            foreach ($categories as $categoryId) {
                $category = Category::find($categoryId);
                if ($category) {
                    $Post->categories()->attach($categoryId);
                }
            }
        } else {
            $Post->categories()->detach();
        }
        $Post->save();

        return redirect()->route('posts'); // redirect to the users index page
    }

    public function byfilter(Request $request)
{
    // Retrieve filter inputs with default empty values
    $date = $request->input('date') ?? '';
    $name = $request->input('name') ?? '';
    $statuses = $request->input('status') ?? 2; // Default to 'All'

    // Start building the query
    $query = Post::query();
    $query->where('user_id', '=', Auth::user()->id);

    // Apply filters if they are provided
    if (!empty($date)) {
        // Assuming 'created_at' is the date column you want to filter by
        $query->whereDate('created_at', '=', $date);
    }

    if (!empty($name)) {
        // Filter by name (assuming 'name' is a column in the posts table)
        $query->where('name', 'LIKE', '%' . $name . '%');
    }

    // Only apply status filter if it's not 'All'
    if ($statuses != 2) {
        // Filter by selected status
        $query->where('status', '=', $statuses);
    }

    // Execute the query and get the results, using pagination
    $posts = $query->paginate(10); // Use pagination directly on the filtered query
    $items= $query->paginate(10);
    // Set a title for the view (make sure to define this variable)
    $title = 'Filtered Posts'; // You can customize this as needed

    // Return a view with the filtered posts
    return view('admin_panel.posts.list-post', compact('posts', 'title','items'));
}

    
    
    
}

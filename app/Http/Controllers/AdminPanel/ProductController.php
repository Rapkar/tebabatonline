<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Option;
class ProductController extends Controller
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
        $products = Product::take(10)->get();
        $items = product::paginate(10);
        $title = __("admin.Product Page");
        return view('admin_panel.products.list-product', compact('products', 'title', 'items'));
    }
    public function create(Request $request)
    {
        $categories = Category::where('type', '=', 'products')->get();
        $title = __("admin.Create Product Page");
        return view('admin_panel.products.create-product', compact('categories', 'title'));
    }
    public function store(Request $request)
    {


        $validator = $this->validator($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $Product = new Product();
        $Product->name = $request->input('name');
        $Product->content = $request->input('content');
        $Product->expert = $request->input('expert');
        $Product->slug = $request->input('slug');
        $Product->price = $request->input('price');
        $Product->quantity = $request->input('quantity');
        $Product->discount = $request->input('discount');
        // $imageName = time().'.'.$request->image->getClientOriginalExtension();
        // $url=$request->image->storeAs('images', $imageName);

        $Product->image = $request->input('image');

        $Product->gallery = $request->input('gallery')[0];
        $Product->status = $request->input('status');
        $Product->save();

        // if($request->input('category')){
        //     foreach($request->input('category') as $category){
        //         $category = Category::find($category);
        //         $Post = Post::find($Post->id);
        //         $category->posts()->attach($Post->id);
        //     }
        // }
        if ($request->input('category')) {
            $categories = $request->input('category');
            $Product = Product::find($Product->id);
            foreach ($categories as $category) {
                $category = Category::find($category);
                $Product->categories()->attach($category->id);
            }
        }

        return redirect()->route('productlist'); // redirect to the users index page
    }
    public function delete($id)
    {
        $Post = Product::find($id);
        if ($Post) {
            $Post->delete();
            return redirect()->route('productlist');
        } else {
            dd("post not found");
        }
    }
    public function edit($id)
    {
        $product = Product::all()->find($id);
        $categories = Category::where('type', '=', 'products')->get();
        // $role = Category::all()->find($request->input('role'));
        $cats = $product->categories()->get();
        $ids = [];
        foreach ($cats as $cat) {
            $ids[] = $cat->id;
        }

        $title = __("admin.Edit Product Page");
        return view('admin_panel.products.edit-product', compact('product', 'categories', 'ids', 'title'));
    }
    public function update(Request $request, $id)
    {
        $Product = Product::find($id);
        // if ($request->method() == 'GET') {
        //     #return redirect()->back()->withInput();
        // }

        $validator = $this->validator($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $Product->name = $request->input('name');
        $Product->content = $request->input('content');
        $Product->expert = $request->input('expert');
        $Product->slug = $request->input('slug');
        $Product->image = $request->input('image');

        $Product->gallery = $request->input('gallery')[0];
        $Product->status = $request->input('status');

        $Product->save();
        #  $user->address = $request->input('address');



        return redirect()->route('productlist'); // redirect to the users index page
    }
    public function updateQuantity(Request $request)
    {
        $Visit_id= $request->input('visit_id');
        if (empty($request->section)) {
            $section = "cart";
        } else {
            $section = "mediccart";
        }

        $product = Product::findOrFail($request->product_id);
        // dd($product->visit->first()->pivot->count);
        if ($section == "cart") {
            $product->carts()->updateExistingPivot($request->cart_id, ['quantity' => $request->quantity]);
            $newquanity = $product->carts->first()->pivot->quantity;
        } else {
            $product->visits()->updateExistingPivot( $Visit_id, ['count' => $request->quantity]);
            $newquanity = $product->visits->first()->pivot->count;
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Quantity updated successfully',
            'new_quantity' => $newquanity
        ]);
    }
    public function getproductbyprice(Request $request)
    {


        // Retrieve minimum and maximum price from request
        $min_price = intval($request->minprice);
        $max_price = intval($request->maxprice);

        // Ensure min_price is less than max_price
        if ($min_price > $max_price) {
            return response()->json(['error' => 'Minimum price must be less than maximum price.'], 400);
        }

        // Query the products within the specified price range
        $products = Product::whereBetween('price', [$min_price, $max_price])->get();
        $result = view('website.part.products', compact('products'))->render();
        // Return the results as a JSON response
        return response()->json(['data' => $result], 200);
    }
    public function byfilter(Request $request)
    {
        // Retrieve filter inputs with default empty values
        $date = $request->input('date') ?? '';
        $name = $request->input('name') ?? '';
        $statuses = $request->input('status') ?? 2; // Default to 'All'
    
        // Start building the query
        $query = Product::query();
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
        $products = $query->paginate(10); // Use pagination directly on the filtered query
        $items= $query->paginate(10);
        // Set a title for the view (make sure to define this variable)
        $title = 'Filtered Posts'; // You can customize this as needed
    
        // Return a view with the filtered posts
        return view('admin_panel.products.list-product', compact('products', 'title','items'));
    }
}

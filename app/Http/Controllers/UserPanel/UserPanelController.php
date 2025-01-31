<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Http\Controllers\helper;
use App\Models\User;
use App\Models\UserMeta;
use App\Notifications\VisitNotification;

class UserPanelController extends Controller
{
    public function editprofile($id)
    {
        $user = Auth::user();
        // dd(Auth::user()->hasRole('user'));
        // $posts = Post::all();
        $posts = Post::whereHas('categories', function ($query) {
            $query->where('name', 'home-post');
        })->get();
        $products = Product::whereHas('categories', function ($query) {
            $query->where('name', 'home-product');
        })->get();
        $cart = session()->get('cart', []);
        $orderitems = [];
        foreach ($cart as $item) {
            $orderitems[] = Product::all()->find($item);
        }
        // $order = Product::whereIn('id', $cart)->get();

        $orderitems = array_unique($orderitems);
        $cart = count($cart);
        $title = __("medic.Medic Page");
        $helper = new helper;
        $states = $helper->getState();


        // Get all users with the role 'Medic'


        






        // session()->flash('alert', 'Hey, you have a new message!');
        // Auth::user()->notify(new UserNotification($message));
        //  event(new VisitProcessed($message));
        // $user->notify();
        // Notification::send(Auth::user(), new UserNotification());
        // $user->notify(new UserNotification());
        // dd($user->usermetas->lastname);
        return view('user_panel.panel.edit', compact('title', 'states', 'products', 'cart', 'orderitems'));
    }

    //    Update the Profile

    public function updateprofile(Request $request)
    {
        // Find the authenticated user
        $user = User::find(Auth::user()->id);

        // Check if the user meta already exists
        $usermeta = UserMeta::where('user_id', $user->id)->first();

        // If it does not exist, create a new instance
        $usermeta = $user->usermetas ?: new UserMeta;

        // Update the user meta fields
        $usermeta->lastname = $request->lastname ?? '';
        $usermeta->age = $request->age ?? '';
        $usermeta->relationship = $request->relationship ?? '';
        $usermeta->gender = $request->gender ?? '';
        $usermeta->city = $request->cities ?? '';
        $usermeta->state = $request->states ?? '';
        $usermeta->address = $request->address ?? '';
        $usermeta->postalcode = $request->postalcode ?? '';
        $usermeta->height = $request->height ?? '';
        $usermeta->job = $request->job ?? '';
        $usermeta->user_id = Auth::user()->id;

        // Save the user meta (this will either create a new record or update an existing one)
        $usermeta->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', __('باموفقیت ویرایش شد'));
    }

    //     public function updateprofile(Request $request)
    //     {
    //         // Validate the incoming request data
    //         $request->validate([
    //             'lastname' => 'required|string|max:255',
    //             'age' => 'required|integer',
    //             'relationship' => 'required|string|max:255',
    //             'gender' => 'required|string|max:10',
    //             'cities' => 'required|string|max:255',
    //             'states' => 'required|string|max:255',
    //             'address' => 'required|string|max:255',
    //             'postalcode' => 'required|string|max:20',
    //             'height' => 'required|numeric',
    //             'job' => 'required|string|max:255',
    //         ]);

    //         // Find the authenticated user
    //         $user = Auth::user();

    //         // Check if usermeta already exists for the authenticated user
    //         $usermeta = $user->usermetas; // Get the first usermeta associated with the user

    //         // if ($usermeta) {
    //         //     // Update existing usermeta
    //         //     $usermeta->lastname = $request->lastname;
    //         //     $usermeta->age = $request->age;
    //         //     $usermeta->relationship = $request->relationship;
    //         //     $usermeta->gender = $request->gender;
    //         //     $usermeta->city = $request->cities;
    //         //     $usermeta->state = $request->states;
    //         //     $usermeta->address = $request->address;
    //         //     $usermeta->postalcode = $request->postalcode;
    //         //     $usermeta->height = $request->height;
    //         //     $usermeta->job = $request->job;

    //         //     // Save the updated usermeta
    //         //     $usermeta->save();
    //         // } else {
    //         // Create new usermeta if it does not exist
    //         $newUserMeta = new UserMeta;
    //         $newUserMeta->lastname = $request->lastname;
    //         $newUserMeta->age = $request->age;
    //         $newUserMeta->relationship = $request->relationship;
    //         $newUserMeta->gender = $request->gender;
    //         $newUserMeta->city = $request->cities;
    //         $newUserMeta->state = $request->states;
    //         $newUserMeta->address = $request->address;
    //         $newUserMeta->postalcode = $request->postalcode;
    //         $newUserMeta->height = $request->height;
    //         $newUserMeta->job = $request->job;

    //         // Save the new usermeta
    //         $newUserMeta->save();

    //         // // Attach the new usermeta to the user
    //         // $user->usermetas->attach($newUserMeta->id);
    //         // }

    //         return redirect()->back()->with('success', __('باموفقیت ویرایش شد'));
    //     }
}

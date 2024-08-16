<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use function Ramsey\Uuid\v1;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // $role = Role::find(1);
        // $user = User::find(21);
        // $role->users()->attach(1);
        $users = User::all();
        return view('admin_panel.users.list-user', compact('users'));
    }
    public function create(Request $request)
    {
        $roles = Role::all();
        return view('admin_panel.users.create-user', compact('roles'));
    }
    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20'],
        ]);
    }
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = bcrypt($request->input('password')); // hash the password
        $user->save();

        
         $role = Role::find($request->input('role'));
         $user = User::find($user->id);
         $role->users()->attach($user->id);
  
      
        // $user = User::find(1);
       
        // $user->roles()->attach($request->input('roles'));
        // $role = Role::find($request->input('roles'));
        // $user = User::find(5);
        // $role->users()->attach($user);

        return redirect()->route('users'); // redirect to the users index page
    }
    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('users');
        } else {
            // handle error
        }
    }
}

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
        // $users = User::all();
        $roles = Role::all();
        $title = __("admin.Users Page");
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->take(10)->get();
        $items = User::paginate(10);
        return view('admin_panel.users.list-user', compact('users', 'roles', 'title', 'items'));
    }
    public function create(Request $request)
    {
        $title = __("admin.Create User Page");
        $roles = Role::all();
        return view('admin_panel.users.create-user', compact('roles', 'title'));
    }
    protected function validator($request)
    {
        $data = $request->all();
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20']
        ], [
            'name.required' => __("admin.The name field is required."),
            'name.string' => __('admin.The name must be a string.'),
            'name.max' => __('admin.The name must not be greater than :max characters.'),
            'name.unique' => __('admin.The name has already been taken.'),
            'phone.required' => __('admin.The slug field is required.'),
            'phone.string' => __('admin.The slug must be a string.'),
            'phone.max' => __('admin.The slug must not be greater than :max characters.'),
            'phone.unique' => __('admin.The slug has already been taken.'),
            'email.required' => __("admin.The image field is required."),
            'email.string' => __("admin.The image must be a string."),
            'email.max' => __("admin.The image must not be greater than :max characters."),
        ]);
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validator = $this->validator($request);
        // dd($user);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($user) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            if ($request->input('password')) {
                $user->password = bcrypt($request->input('password')); // hash the password
            }

            $user->save();
        }

        // Update the user's role
        $role = Role::find($request->input('role'));
        if ($user->hasRole($role)) {
            $user->roles()->detach();
        }
        if ($role) {
            $user->roles()->attach($role);
        }

        return redirect()->route('users'); // redirect to the users index page
    }
    public function store(Request $request)
    {
        $validator = $this->validator($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // S
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->password = bcrypt($request->input('password')); // hash the password
        $user->save();


        $role = Role::find($request->input('role'));
        $user = User::find($user->id);
        $role->users()->attach($user->id);
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
    public function edit($id)
    {
        $user = User::all()->find($id);
        $roles = Role::all();
        $title = __("admin.Edit User Page");
        return view('admin_panel.users.edit-user', compact('user', 'roles', 'title'));
    }
    public function getusersbyrole(Request $request)
    {
        $roles = Role::all();
        $role = Role::all()->find($request->input('role'));
        $role = $role->name;
        $users = User::whereHas('roles', function ($query) use ($role) {
            $query->where('name', $role);
        })->get();
        // echo json_encode(view('admin_panel.users.list-user', compact('users', 'roles')));
        return view('admin_panel.users.parts.list', compact('users', 'roles'));
    }
}

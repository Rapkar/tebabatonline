<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\helper;
use App\Models\Option;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    public $logoimg;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $options = Option::whereIn('key', ['showSecurityQuestion', 'logoimg'])->pluck('value', 'key');
        $this->logoimg = $options->get('logoimg');
        view()->share([
            'logourl' =>  $this->logoimg
        ]);
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'phone' => $data['phone'],
        //     'password' => Hash::make($data['password']),
        // ]);
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->address = $data['address'];

        $user->password = Hash::make($data['password']); // hash the password
        $user->save();
        $user->roles()->attach('4');
        return $user;
    }
    public function showRegistrationForm()
    {
        // Add any data you want to pass to the view
        $title = __("auth.Register");
        $helper = new helper;
        $states = $helper->getState();
        return view('auth.register', compact('title','states'));
    }
}

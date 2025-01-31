<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $showSecurityQuestion;
    public $logoimg;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $options = Option::whereIn('key', ['showSecurityQuestion', 'logoimg'])->pluck('value', 'key');
        $this->showSecurityQuestion = $options->get('showSecurityQuestion');
        $this->logoimg = $options->get('logoimg');
        view()->share([
            'logourl' =>  $this->logoimg
        ]);

        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    public function showLoginForm()
    {
        // Add any data you want to pass to the view
        $title = __("auth.Login");
        $operators = ['+', '-', '*'];

        // Randomly select an operator from the array
        $operator = $operators[rand(0, count($operators) - 1)];

        // Generate two random numbers between 0 and 20
        $number1 = rand(0, 20);
        $number2 = rand(0, 20);
        if ($this->showSecurityQuestion != 'on') {
            $security_quiz = null;
        } else {
            $security_quiz = "$number1 $operator $number2";
        }
        // Construct the security quiz question


        // Calculate the answer without using eval
        switch ($operator) {
            case '+':
                $security_quize_answer = $number1 + $number2;
                break;
            case '-':
                $security_quize_answer = $number1 - $number2;
                break;
            case '*':
                $security_quize_answer = $number1 * $number2;
                break;
        }

        // Store the correct answer in session
        session(['security_quiz_answer' => $security_quize_answer]);

        return view('auth.login', compact('title', 'security_quiz'));
    }

    protected function authenticated(Request $request, $user)
    {

        // Check if the quiz answer is correct
        if ($this->showSecurityQuestion == 'on') {
            if ($request->input('quiz_answer') != session('security_quiz_answer')) {
                Auth::logout();
                Log::warning('User attempted to log in with an incorrect answer.', [
                    'user_id' => $user->id ?? null,
                    'ip_address' => $request->ip(),
                    'quiz_answer' => $request->input('quiz_answer'),
                ]);
                return redirect()->back()->withErrors(['quiz_answer' => __('auth.Incorrect answer to the security quiz.')]);
            }
        }
        // Clear the session variable
        session()->forget('security_quiz_answer');

        return redirect()->intended($this->redirectTo);
    }
}

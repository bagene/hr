<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class AuthController extends Controller
{
    /**
     * Login Page
     * 
     * @return Response
     */
    public function login(): Response
    {
        return Inertia::render('Auth/Login');
    }

    /**
     * Authenticate User
     * 
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $input = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($input)) {
            $request->session()->regenerate();

            return redirect(route('home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Register Page
     * 
     * @return Response
     */
    public function register(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Register User
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
        ]);

        return redirect(route('auth.register'));
    }

    /**
     * Logout User
     * 
     * @return Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }

    /**
     * Reset Password
     */
    public function reset_password(Request $request) 
    {
        return Inertia::render('Auth/Password', $request->only(['token','email']));
    }

    /**
     * Reset Password
     */
    public function reset_password_post(Request $request) 
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'), 
            function($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
 
                event(new PasswordReset($user));
            }
        );

        return redirect()->route('auth.login', compact('status'));
    }   

    /**
     * Set Password
     * 
     * @return Response
     */
    public function set_password(Request $request)
    {
        $input = $request->validate([
            'password' => ['required', 'confirmed'],
        ]);

        $user = $request->auth()->user();

        $user->setPassword($input['password']);

        return redirect(route('home'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

    public function store(Request $request) 
    {
        $formfield = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash Password 
        $formfield['password'] = bcrypt($formfield['password']);

        // Create user
        $user = User::create($formfield);

        // Log in
        auth()->login($user);

        // add a message to the session data (display via popup-messsage)
        return redirect('/home')->with('message', 'User created and logged in');
    }

    public function logout (Request $request) 
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }

    public function login ()
    {
        return view('users.login');
    }

    // Authenticate user
    public function auth (Request $request)
    {
        $formfield = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formfield)) {
            $request->session()->regenerate();
            return redirect('/home')->with('message', 'You are now logged in!');
        }
         
        return redirect('/login')->withErrors(['password' => 'Invalid credentials'])->onlyInput('password');

    }
}

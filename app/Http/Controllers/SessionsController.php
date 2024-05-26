<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
//use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' =>  ['required', 'email'],
            'password' => ['required']
        ]);

        if(!auth()->attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Your email or password password is incorrect'
            ]);
        }

        session()->regenerate(); //to prevent session fixation attacks

        return redirect('/')->with('success', 'Welcome Back!');

    }


    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Logged out succesfully');
    }
}

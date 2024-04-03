<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    function registerForm()
    {
        return view('register');        
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);
        
        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);

        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        return redirect()->route('dashboard')->withSuccess('You have successfully registered & logged in!');
    }
}

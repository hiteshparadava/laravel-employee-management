<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout'
        ]);
    }

    function loginForm()
    {
        return view('login');
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login')->withSuccess('You have logged out successfully!');;
    }

    function authenticate(Request $request)
    {
        $credentials=$request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if(Auth::attempt($credentials))
        {
            return redirect()->route('dashboard')->withSuccess('You have successfully logged in!');
        }
        return back()->withErrors(['email' => 'Your provided credentials do not match in our records.'])->onlyInput('email');
    }
}

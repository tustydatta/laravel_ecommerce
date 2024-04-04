<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')
                    ->withSuccess('You have successfully registered & logged in!');

    }

    public function dashboard()
    {
        if(Auth::check()){
            return redirect()->route('items.index');
        }

        return redirect()->route('login')
                        ->withErrors([
                            'email' => 'Please login to access the dashboard.',
                        ])->onlyInput('email');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('items.index')
                        ->withSuccess('You have successfully logged in!');
        }
        return back()->withErrors(['email' => 'You provided credentials do not match in our records.',])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
                    ->withSuccess('You have logged out suucessfully!');
    }

}
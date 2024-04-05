<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    public function adminLogin()
    {
        return view('backend.admin_login');
    }

    public function adminAuthenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin_info = Admin::where($credentials)->first();
     
        if(isset($admin_info->name)) {
            $request->session()->put('admin_user_name', $admin_info->name);
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors(['email' => 'You provided credentials do not match in our records.',])->onlyInput('email');
    }

    public function adminLogout(Request $request)
    {
        $request->session()->put('admin_user_name', '');
        return redirect()->route('admin_login')
                    ->withSuccess('You have logged out suucessfully!');
    }

    public function register()
    {
        return view('frontend.auth.register');
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
        return view('frontend.auth.login');
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
            return redirect()->route('home');
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

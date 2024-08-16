<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function view()
    {
        return view('login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        // Check if the user exists
        if (!$user) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

        $role = $user->role;

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            switch ($role) {
                case 'farmer':
                    return redirect()->intended('home')->with('success', 'Login successful, Farmer');
                case 'company_worker':
                    return redirect()->intended('dashboard')->with('success', 'Login successful, Worker');
                case 'vet':
                    return redirect()->intended('vetdashboard')->with('success', 'Login successful, Vet');
                case 'admin':
                    return redirect()->intended('dashboard')->with('success', 'Login successful, Admin');
                case 'user':
                    return redirect()->intended('home')->with('success', 'Login successful, User');
                default:
                    return redirect()->intended('home')->with('success', 'Login successful');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}

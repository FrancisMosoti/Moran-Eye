<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest');
    }

        public function view(){
            return view('login');
        }

        public function login(Request $request){

            
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
            // find($credentials['email'])
            $email = $request->input('email');
            $user = User::where('email', $email)->first();
            $role = $user->role;
            
     
            if (Auth::attempt($credentials, $request->input('remember', 'false'))) {
                $request->session()->regenerate();

                if($role== 'tenant'){
                    return redirect()->intended('home')->with('success', 'Login successful');

                }elseif($role== 'landlord'){
                    return redirect()->intended('dashboard')->with('success', 'Login successful');
                }else{
                    abort(403, 'Unauthorized action.');
                }
     
                
            }
     
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
}

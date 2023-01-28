<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }

    public function signup()
    {
        return view('signup');
    }
    
    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        //checking credentials
        if (Auth::attempt($credentials)) {

            //for INACTIVE users, 
            if (Auth::user()->status != 'Active') {

                Session::flash('status', 'Failed');
                Session::flash('message', 'Your account is inactive, 
                please contact your admin');

                return redirect('/login');
            }

            $request->session()->regenerate();


            //for ACTIVE USERS = ADMIN
            if (Auth::user()->role_id == 1) {
                return redirect('dashboard');

            }
            
 
            //for ACTIVE USERS = CLIENT
            if (Auth::user()->role_id == 2) {
                return redirect('profile');

            }
            
        }

        //for WRONG USERNAME OR PASSWORD
        Session::flash('status', 'Failed');
        Session::flash('message', 'Invalid username or password');

        return redirect('/login');
 
        
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}

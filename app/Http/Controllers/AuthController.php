<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

                //to cancel USER'S session for INACTIVE account after registration
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

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

    public function signupProcess(Request $request)
    {
        
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255', //users-> refers USERS table name in DB
            'password' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'required',
        ]);

        //for hashing password in DB (password encryption)
        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());

        //for WRONG USERNAME OR PASSWORD
        Session::flash('status', 'Success');
        Session::flash('message', 'Registration successful, please contact your admin for account approval');
        return redirect('signup');
    }
}

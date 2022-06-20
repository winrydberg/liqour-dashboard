<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function authenticateAdmin(Request $request){
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->to('/dashboard');
        } else{
            Session::flash('error', 'Invalid Login Credential');
            // Session::flash('error', 'Invalid Login Credentials');
            return back();
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->to('/');
    }
}